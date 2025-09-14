@extends('layouts.app')

@section('title', $title)

@section('content')
<style>
    /* .tree { text-align: center; margin-top: 20px; }
    .tree ul { padding: 0; display: flex; justify-content: center; }
    .tree li { list-style: none; margin: 10px; text-align: center; position: relative; }
    .tree li::before, .tree li::after {
        content: "";
        position: absolute;
        top: 0;
        left: 50%;
        border-top: 2px solid #ccc;
        width: 50%;
        height: 20px;
    }
    .tree li::after { left: auto; right: 50%; }
    .tree li div { background: #007bff; color: white; padding: 10px; border-radius: 5px; display: inline-block; } */
    .tree {
            text-align: center;
            position: relative;
        }

        .tree ul {
            padding-top: 20px;
            position: relative;
            list-style: none;
            display: flex;
            justify-content: center;
        }

        .tree li {
            text-align: center;
            position: relative;
            padding: 1px 5px 0 5px;
        }

        /* Lines connecting nodes */
        .tree li::before, 
        .tree li::after {
            content: "";
            position: absolute;
            top: 0;
            right: 50%;
            border-top: 2px solid #666;
            width: 50%;
            height: 20px;
        }

        .tree li::after {
            right: auto;
            left: 50%;
            border-left: 2px solid #666;
        }

        .tree li:only-child::after, 
        .tree li:only-child::before {
            display: none;
        }

        .tree ul ul::before {
            content: "";
            position: absolute;
            top: 0;
            left: 50%;
            border-left: 2px solid #666;
            width: 0;
            height: 20px;
        }

        /* Node design */
        .tree li div {
            display: inline-block;
            border-radius: 8px;
            padding: 12px 20px;
            background-color: #007bff;
            color: white;
            font-size: 16px;
            font-weight: bold;
            border: 2px solid #007bff;
            transition: all 0.3s ease-in-out;
            cursor: pointer;
            position: relative;
        }

        /* Hover Effect */
        .tree li div:hover {
            background-color: white;
            color: #007bff;
            border: 2px solid #007bff;
            transform: scale(1.05);
        }

        /* Responsive Design */
        @media screen and (max-width: 768px) {
            .tree ul {
                flex-direction: column;
                align-items: center;
            }
            .tree ul ul::before {
                display: none;
            }
            .tree li::before,
            .tree li::after {
                display: none;
            }
        }
</style>
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Genealogy</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    {{-- <li class="breadcrumb-item">User Management</li> --}}
                    <li class="breadcrumb-item active">Genealogy</li>
                </ol>
            </nav>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Details</h5>
                            <div class="tree" id="mlmTree"></div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    <script>
//         async function fetchMLMTree() {
//             let response = await fetch('/admin/mlm-tree');
//             let treeData = await response.json();
//             console.log(treeData);
//             document.getElementById('mlmTree').innerHTML = generateTreeHTML(treeData);
//         }

//         function generateTreeHTML(tree) {
//     if (!tree || typeof tree !== 'object') return '';

//     let html = `<ul>`;
//     html += `<li><div>${tree.name}</div>`;

//     if (tree.children && tree.children.length > 0) {
//         html += `<ul>`;
//         tree.children.forEach(child => {
//             html += generateTreeHTML(child); // No need to wrap <li> here
//         });
//         html += `</ul>`;
//     }

//     html += `</li></ul>`;
//     return html;
// }


//         fetchMLMTree();
        var user_id= '{{ Auth::id() }}';
        // console.log(user_id);
        async function fetchMLMTree(user_id) {
            try {
                let response = await fetch('/admin/admin_mlm-tree/'+user_id);

                if (!response.ok) {
                    throw new Error(`HTTP error! Status: ${response.status}`);
                }

                let treeData = await response.json();
                document.getElementById('mlmTree').innerHTML = generateTreeHTML(treeData);
            } catch (error) {
                console.error('Error fetching MLM tree:', error);
                document.getElementById('mlmTree').innerHTML = `<p style="color:red;">Error: ${error.message}</p>`;
            }
        }

        function generateTreeHTML(tree) {
            if (!tree || typeof tree !== 'object') return '';

            let html = `<ul><li onclick='fetchMLMTree(${tree.id})'><div>${tree.name}</div>`;

            if (tree.children && tree.children.length > 0) {
                html += `<ul>`;
                tree.children.forEach(child => {
                    html += `<li onclick='fetchMLMTree(${child.id})'>${generateTreeHTML(child)}</li>`;
                });
                html += `</ul>`;
            }

            html += `</li></ul>`;
            return html;
        }

        fetchMLMTree(user_id);
    </script>
    </main><!-- End #main -->
@endsection
