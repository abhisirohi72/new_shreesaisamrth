@extends('layouts.app')

@section('title', $title)

@section('content')
    <div class="overlay" id="overlay"></div>
    <div class="wrap">
        <div class="banner">
            <div class="promo-tag">NEW</div>
            <div class="txt">
                <h1>Invest in ChargingBD — get huge returns</h1>
                <p>Download the app from the Play Store to get started</p>
            </div>
            <img src="https://via.placeholder.com/80x80/222244/ffeb3b?text=App" alt="App Icon" style="border-radius:12px;">
        </div>
        <div class="title-bar">
            <div class="icon" id="menuButton"><i class="ri-menu-line"></i></div>
            <div class="text">Search for investments</div>
        </div>
        <div class="quick-row">
            <div class="quick">
                <i class="ri-user-star-line icon"></i>
                <small>Agent Comp.</small>
            </div>
            <div class="quick">
                <i class="ri-wallet-3-line icon"></i>
                <small>Recharge</small>
            </div>
            <div class="quick">
                <i class="ri-bank-card-line icon"></i>
                <small>Withdrawal</small>
            </div>
            <div class="quick">
                <i class="ri-line-chart-line icon"></i>
                <small>My Invest.</small>
            </div>
            <div class="quick">
                <i class="ri-group-line icon"></i>
                <small>My Team</small>
            </div>
            <div class="quick">
                <a href="#"
                    style="text-decoration:none; color:inherit; display:flex; flex-direction:column; align-items:center;">
                    <i class="ri-flow-chart-line icon"></i>
                    <small>Genealogy</small>
                </a>
            </div>
            <div class="quick">
                <i class="ri-notification-3-line icon"></i>
                <small>Notices</small>
            </div>
            <div class="quick">
                <i class="ri-question-fill icon"></i>
                <small>Help</small>
            </div>
        </div>
        <div class="section">
            <div class="line"></div>
            <h3>Investment List</h3>
        </div>
        <div class="list">
            <div class="card">
                <div class="left">
                    <div class="name">Robot</div>
                    <div class="meta">
                        <i class="ri-time-line"></i> Period: 30 Days<br>
                        <i class="ri-percent-line"></i> Daily Profit: ₹0.67<br>
                        <strong style="color:var(--accent);">Total revenue: ₹20</strong>
                    </div>
                </div>
                <div class="price">
                    <div class="amt">₹10</div>
                    <a href="#" class="btn">Activated</a>
                </div>
            </div>
            <div class="card">
                <div class="left">
                    <div class="name">Robot-2</div>
                    <div class="meta">
                        <i class="ri-time-line"></i> Period: 30 Days<br>
                        <i class="ri-percent-line"></i> Daily Profit: ₹1.33<br>
                        <strong style="color:var(--accent);">Total revenue: ₹40</strong>
                    </div>
                </div>
                <div class="price">
                    <div class="amt">₹20</div>
                    <a href="#" class="btn">Activated</a>
                </div>
            </div>
            <div class="card">
                <div class="left">
                    <div class="name">Robot-3</div>
                    <div class="meta">
                        <i class="ri-time-line"></i> Period: 30 Days<br>
                        <i class="ri-percent-line"></i> Daily Profit: ₹3.33<br>
                        <strong style="color:var(--accent);">Total revenue: ₹100</strong>
                    </div>
                </div>
                <div class="price">
                    <div class="amt">₹50</div>
                    <a href="#" class="btn ghost">Invest</a>
                </div>
            </div>
            <div class="card">
                <div class="left">
                    <div class="name">Robot-4</div>
                    <div class="meta">
                        <i class="ri-time-line"></i> Period: 30 Days<br>
                        <i class="ri-percent-line"></i> Daily Profit: ₹4.33<br>
                        <strong style="color:var(--accent);">Total revenue: ₹120</strong>
                    </div>
                </div>
                <div class="price">
                    <div class="amt">₹60</div>
                    <a href="#" class="btn ghost">Invest</a>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom-nav">
        <div class="nav-inner">
            <div class="nav" role="navigation" aria-label="bottom navigation">
                <a href="#" class="item active">
                    <i class="ri-home-5-fill icon"></i>
                    <span>Home</span>
                </a>
                <a href="#" class="item">
                    <i class="ri-bar-chart-fill icon"></i>
                    <span>Invest</span>
                </a>
                <div style="width: 84px;"></div>
                <a href="#" class="item">
                    <i class="ri-user-star-fill icon"></i>
                    <span>Agent</span>
                </a>
                <a href="#" class="item">
                    <i class="ri-user-fill icon"></i>
                    <span>My</span>
                </a>
            </div>
            <div class="fab-wrap">
                <div class="fab" title="Quick Menu">
                    <i class="ri-add-line icon"></i>
                </div>
            </div>
        </div>
    </div>
    <script></script>
    <div class="modal fade" id="basicModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    {{-- <h5 class="modal-title">View Details</h5> --}}
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modal-body">
                    <img src="{{ asset('storage/documents/popup') . '/' . $popup->image }}"
                        style="width: 100%; height: 100%;">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                </div>
            </div>
        </div>
    </div><!-- End Basic Modal-->
@endsection
@push('script-push')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var myModal = new bootstrap.Modal(document.getElementById('basicModal'));
            myModal.show();
        });

        function copyToClipboard() {
            var copyText = document.getElementById("referral-link");
            copyText.select();
            copyText.setSelectionRange(0, 99999); // For mobile devices
            document.execCommand("copy");

            // Optional: Show alert or change button text
            alert("Copied: " + copyText.value);
        }

        function shareOnWhatsApp() {
            var input = document.getElementById("referral-link").value;
            var url = "https://wa.me/?text=" + encodeURIComponent(input);
            window.open(url, "_blank");
        }
        const menuButton = document.getElementById('menuButton');
        const sideMenu = document.getElementById('sideMenu');
        const sideMenuClose = document.getElementById('sideMenuClose');
        const overlay = document.getElementById('overlay');

        function toggleMenu() {
            sideMenu.classList.toggle('active');
            overlay.classList.toggle('active');
        }
        menuButton.addEventListener('click', toggleMenu);
        sideMenuClose.addEventListener('click', toggleMenu);
        overlay.addEventListener('click', toggleMenu);
        const quickBoxes = document.querySelectorAll('.quick');
        const hoverSound = new Audio('hover-sound.mp3');
        quickBoxes.forEach(box => {
            box.addEventListener('click', () => {
                hoverSound.currentTime = 0;
                hoverSound.play();
            });
        });
    </script>
@endpush
