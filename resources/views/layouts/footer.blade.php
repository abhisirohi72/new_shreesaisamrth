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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function getSponsor(sponsor_id) {
        // alert(sponsor_id);
        $.ajax({
            type: "POST",
            url: '{{ route('user.get_sponsor') }}',
            data: {
                sponsor_id: sponsor_id,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
                $("#sponsor_email").html(data);
            },
            error: function(xhr) {
                console.error('CSRF or server error:', xhr.responseText);
            }
        });
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

    // Submenu functionality
    const dropdownToggles = document.querySelectorAll('.dropdown-toggle');
    dropdownToggles.forEach(toggle => {
        toggle.addEventListener('click', (e) => {
            e.preventDefault();
            const parentLi = toggle.closest('li');
            parentLi.classList.toggle('active');
            const submenu = document.getElementById(toggle.dataset.target.substring(1));
            submenu.classList.toggle('open');
        });
    });

    $(document).ready(function(){
        $(".alert").click(function(){
            $(this).hide();
        });
    });
</script>
