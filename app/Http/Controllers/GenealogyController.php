<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class GenealogyController extends Controller
{
    public function index(Request $request) : View
    {
        $title= "Genealogy";

        $details= User::where("user_type", '2')->get();

        return view('admin.genealogy.view', [
            "title" =>  $title
        ]);
    }

    // Return JSON response
    public function showMLMTree($user_id, Request $request)
    {
        try {
            // $user_id = $request->input('user_id', 1); // Default to Admin (1)
            // exit;
            $mlmTree = $this->getMLMTree($user_id);
            // echo "<pre>";
            // print_r($mlmTree);

            if (!$mlmTree) {
                return response()->json(['error' => 'No data found'], 200);
            }

            return response()->json($mlmTree, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }




    // Recursive function to generate MLM tree
    public function getMLMTree($user_id)
    {
        try {
            // Get the parent (sponsor) user
            $parent = User::where('id', $user_id)->first();
            // echo "<pre>";
            // print_r($parent);
            // exit;
            if (!$parent) {
                return response()->json(['error' => 'User not found'], 404);
            }

            // Get the children (downlines) of the parent
            $children = User::where('sponsor_id', $user_id)->where("user_type",'2')->get();

            // Build the tree structure
            $tree = [
                'id' => $parent->id,
                'name' => $parent->name,
                'children' => []
            ];
            // echo "<pre>";
            // print_r($children);
            // exit;
            foreach ($children as $child) {
                $tree['children'][] = $this->getMLMTree($child->id); // Recursive call
            }
            // echo "<pre>";
            // print_r($tree);
            // exit;
            return $tree;
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }



}
