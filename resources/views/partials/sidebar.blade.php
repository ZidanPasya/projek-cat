<div class="sidebar">
    <div class="datetime">{{ Carbon\Carbon::now()->isoFormat('D MMMM YYYY - HH:mm:ss') }}</div>
    <div class="welcome">
        Selamat datang, <br>
        Unit Sarpras PT<br>
    </div>
    <div class="menu-item" data-toggle="submenu">Manajemen Aset</div>
    <div class="submenu">
        <a href="#" class="menu-item">Prasarana</a>
        <a href="#" class="menu-item">Sarana</a>
        <a href="#" class="menu-item">Inventaris</a>
    </div>

    <div class="welcome">
        Selamat datang, <br>
        Unit Sarpras Pusat<br>
    </div>
    <div class="menu-item" data-toggle="submenu">Sumber Perolehan Aset</div>
    <div class="submenu">
        <a href="#" class="menu-item">Pendanaan</a>
        <a href="#" class="menu-item">Data Paket</a>
    </div>
    <div class="menu-item" data-toggle="submenu">Manajemen Aset</div>
    <div class="submenu">
        <a href="#" class="menu-item">Prasarana</a>
        <a href="#" class="menu-item">Sarana</a>
        <a href="#" class="menu-item">Inventaris</a>
    </div>
</div>


<!-- <script>
    document.addEventListener('DOMContentLoaded', function() {
        var menuItems = document.querySelectorAll('[data-toggle="submenu"]'); // Select all toggles
        menuItems.forEach(function(menu) {
            menu.addEventListener('click', function() {
                var submenu = this
                    .nextElementSibling; // Targets the immediate next sibling with class 'submenu'
                if (submenu.style.display === 'none' || submenu.style.display === '') {
                    submenu.style.display = 'block';
                } else {
                    submenu.style.display = 'none';
                }
            });
        });
    });
</script> -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.menu-item[data-toggle="submenu"]').click(function() {
            $(this).toggleClass('active');
            $(this).next('.submenu').slideToggle();
        });
    });
</script>

<style>
    .sidebar {
        width: 300px;
        height: 100vh;
        background-color: #304250;
        padding: 20px;
        color: white;
        box-sizing: border-box;
    }

    .sidebar .datetime {
        font-size: 20px;
        color: #DDD;
    }

    .sidebar .welcome {
        margin-top: 20px;
        font-size: 18px;
        line-height: 1.4;
    }

    .menu-item {
        margin-top: 20px;
        padding: 10px;
        background-color: #444;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .menu-item:hover {
        background-color: #555;
    }

    .submenu {
        display: none;
        margin-left: 20px;
    }

    .submenu .menu-item {
        background-color: #555;
    }

    .submenu .menu-item:hover {
        background-color: #666;
    }

    .sidebar .datetime {
        font-size: 14px;
        margin-bottom: 20px;
    }

    .sidebar .welcome {
        margin-bottom: 20px;
    }

    .sidebar .menu-item {
        padding: 10px 15px;
        cursor: pointer;
        transition: background-color 0.3s, color 0.3s;
        display: block;
        text-decoration: none;
        color: #ecf0f1;
    }

    .sidebar .menu-item:hover {
        background-color: #34495e;
        color: white;
    }

    .sidebar .submenu {
        display: none;
        padding-left: 20px;
    }

    .sidebar .submenu .menu-item {
        font-size: 14px;
        padding: 8px 15px;
    }

    .sidebar .submenu .menu-item:hover {
        background-color: #3b5368;
    }

    /* .sidebar .menu-item[data-toggle="submenu"]:after {
        content: '\25BC';
        float: right;
        margin-right: 10px;
        transition: transform 0.3s;
    } */

    .sidebar .menu-item[data-toggle="submenu"].active:after {
        transform: rotate(-180deg);
    }

    @media (max-width: 768px) {
        .sidebar {
            width: 200px;
        }

        .sidebar .menu-item,
        .sidebar .submenu .menu-item {
            font-size: 14px;
        }
    }

    .sidebar .datetime {
        font-size: 14px;
        margin-bottom: 20px;
    }

    .sidebar .welcome {
        margin-bottom: 20px;
    }

    .sidebar .menu-item {
        padding: 10px 15px;
        cursor: pointer;
        transition: background-color 0.3s, color 0.3s;
        display: block;
        text-decoration: none;
        color: #ecf0f1;
    }

    .sidebar .menu-item:hover {
        background-color: #34495e;
        color: white;
    }

    .sidebar .submenu {
        display: none;
        padding-left: 20px;
    }

    .sidebar .submenu .menu-item {
        font-size: 14px;
        padding: 8px 15px;
    }

    .sidebar .submenu .menu-item:hover {
        background-color: #3b5368;
    }

    /* .sidebar .menu-item[data-toggle="submenu"]:after {
        content: '\25BC';
        float: right;
        margin-right: 10px;
        transition: transform 0.3s;
    } */

    .sidebar .menu-item[data-toggle="submenu"].active:after {
        transform: rotate(-180deg);
    }

    @media (max-width: 768px) {
        .sidebar {
            width: 200px;
        }

        .sidebar .menu-item,
        .sidebar .submenu .menu-item {
            font-size: 14px;
        }
    }
</style>

<!-- <style>
    .menu-item {
        padding: 10px;
        border-radius: 12px;

    }

    .menu-item:hover {
        background-color: #171B2D;
    }

    ul li {
        list-style-type: none;
        margin-top: 20px;
    }

    a {
        text-decoration: none;
        color: white;
        width: 100%;
        display: flex;
    }

    .sidebar {
        width: 20%;
        height: 100%;
        background-color: #222943;
        color: #fff;
        overflow-y: auto;
        padding: 24px 16px;
        margin-right: 32px;
    }

    .header {
        text-align: center;
        font-size: larger;
    }

    .menu {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .submenu {
        cursor: pointer;
        transition: background-color 0.3s ease;
        padding: 5px;
    }


    .dropdown {
        display: none;
        padding: 0;
    }

    .sidebar .dropdown {
        display: none;
    }

    .dropdown li a {
        padding: 10px;
        border-radius: 12px;
    }

    .dropdown li a:hover {
        background-color: #171B2D;
    }

    h1 {
        color: #333;
    }

    .selected {
        background-color: #383F4F;
    }
</style> -->
