<style>
    .badge {
        padding: 3px 5px 2px;
        position: absolute;
        top: 0px;
        left: 20px;
        display: inline-block;
        min-width: 10px;
        font-size: 12px;
        font-weight: bold;
        color: #ffffff;
        line-height: 1;
        vertical-align: baseline;
        white-space: nowrap;
        text-align: center;
        border-radius: 10px;
    }

    #search_result:hover {
        background-color: rgba(0, 0, 0, 0.1)
    }

    .offcanvas .offcanvas-body a {
        color: black;
    }

    .dropdown-menu a {
        color: black;
    }

    .offcanvas .offcanvas-body .rounded:hover {
        background-color: whitesmoke;
        color: blue;
    }

    .dropdown-menu a:hover {
        color: blue;
        background-color: whitesmoke;
    }

    .stuff .col-2:hover {
        background-color: whitesmoke;
        border: 1px solid black
    }

    .container .header .navbar .menu-icon button:hover {
        background-color: whitesmoke;
    }

    .container .header .navbar .notif-icon .dropstart:hover {
        background-color: whitesmoke;
    }

    .dropdown-menu-right {
        right: 0 !important;
        left: auto !important;
    }

    .container .header .navbar .notif-icon .profile-div .col-2:hover button {
        background-color: whitesmoke;
    }

    #search-results {
        position: absolute;
        z-index: 9999;
        background-color: white;
        width: 32%;
        border: 1px solid #ccc;
        padding: 10px;
        display: none;
        border-radius: 15px;
    }
</style>
<div class="container ">
    <div class="row d-flex  justify-content-between align-items-center header">
        <nav class="navbar bg-white shadow  fixed-top" data-bs-theme="light">
            <div class="col-lg-1 col-md-6 col-4 menu-icon  ms-3">
                <button class="btn" href="#offcanvasExample" aria-controls="offcanvasExample"
                    data-bs-toggle="offcanvas">
                    <i class="bi bi-list h2 text-dark"></i>
                </button>
            </div>
           

            <div class="col"> <a href="/">Logo</a> </div>

            <div class="col">
                <form action="/">
                    <div class="input-group" >
                        <span class="input-group-text rounded-start-pill bg-transparent border-end-0"><i
                                class="bi bi-search"></i></span>
                        <input type="text" id="search-input" name="search" class="form-control rounded-end-pill border-start-0"
                            placeholder="Search">
                    </div>
                </form>
            </div>
            <div id="search-results">
            </div>

            @auth

            <div class="col-lg-2  col-md-3 d-flex justify-content-end notif-icon" style="margin-right: 40px">
                <div class="dropstart rounded">
                    <button role="button" data-bs-toggle="dropdown" aria-expanded="false" id="btn-bell"
                        style="float: left; border: none; font-size:25px; background-color: white">
                        <i class="bi bi-bell " style="float: left; color: black"></i>
                        <input type="hidden" id="user_type">
                        <input type="hidden" id="user_id">
                        <span class="badge bg-danger" id="num_reservation"></span>
                    </button>
                    <ul class="dropdown-menu shadow" id="notification-dropdown" style="max-height: 600px;">
                        <li class="h5 w-100" style="padding-right: 280px; margin-left: 20px">Notifications</li>
                        <hr>
                    </ul>
                </div>
                <div class="profile-div ms-2">
                    <div class="col-2 text-center">
                        <div class="dropdown">
                            <button type="button" data-bs-toggle="dropdown" aria-expanded="false"
                                style="border: none; font-size:25px; background-color: white">
                                <i class="bi bi-person-circle "></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                <li> <form method="POST" action="/logout"> @csrf <button class="dropdown-item submit">Log out</button> </form> </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>



            @else

            <div class="col-lg-3 col-md-3 text-center stuff ">
                <div class="row">
                    <div class="col-2 mx-1 ms-4">
                        <a href="/" class=" text-dark " style="text-decoration: none">Home</a>
                    </div>
                    <div class="col-2 mx-1">
                        <a href="/about" class=" text-dark" style="text-decoration: none">About</a>
                    </div>
                    <div class="col-2 mx-1 ">
                        <a href="/login" class="text-dark" style="text-decoration: none">Login</a>
                    </div>
                    <div class="col-2 mx-1">
                        <a href="/register" class=" text-dark" style="text-decoration: none">Signup</a>
                    </div>
                </div>
            </div>
            @endauth
            
        </nav>
    </div>
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel"
        style="width: 280px;">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title h2" id="offcanvasExampleLabel">Menu</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body h6">
            <a href="/" style="text-decoration: none;">
                <div class="row mx-1 rounded">
                    <div class="col-1 mb-1 h4"><i class="bi bi-house"></i></div>
                    <div class="col-10 ms-2 h6 mt-1">Home</div>
                </div>
            </a>

            @auth

            <a href="/dashboard" style="text-decoration: none;">
                <div class="row mx-1 rounded">
                    <div class="col-1 mb-1 h4"><i class="bi bi-speedometer2"></i></div>
                    <div class="col-10 ms-2 h6 mt-1">Dashboard</div>
                </div>
            </a>
            <a href="houseManagement" style="text-decoration: none;">
                <div class="row mx-1 rounded">
                    <div class="col-1 mb-1 h4"><i class="bi bi-house-gear"></i></div>
                    <div class="col-10 ms-2 h6 mt-1">Manage Houses</div>
                </div>
            </a>
            <a href="/guesthouses/create" style="text-decoration: none;">
                <div class="row mx-1 rounded">
                    <div class="col-1 mb-1 h4"><i class="bi bi-house-add"></i></div>
                    <div class="col-10 ms-2 h6 mt-1">Create House</div>
                </div>
            </a>

            <a href="/dashboard/reservations" style="text-decoration: none;">
                <div class="row mx-1 rounded">
                    <div class="col-1 h4 mb-1"><i class='bi bi-book'></i></div>
                    <div class="col-10 ms-2 h6 mt-1">View Reservations</div>
                </div>
            </a>

            @else

            <a href="/about" style="text-decoration: none;">
                <div class="row mx-1 rounded">
                    <div class="col-1 h4 mb-1"><i class="bi bi-info-circle"></i></div>
                    <div class="col-10 ms-2 h6 mt-1">About Us</div>
                </div>
            </a>

            @endauth            

            <!-- BOTTOM DIV -->
            <?php if (isset($_SESSION['userType'])) {
            ?>
            <!-- <div class="profile-div"
                    style="position: absolute; margin-left: 20px; margin-bottom: 20px; bottom: 0px;">
                    <hr style="padding-left: 230px">
                    <div class="col-2 text-center">
                        <button class="btn btn-white dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="bi bi-person-circle h4"></i><label class="ms-2"><?php echo $_SESSION['firstname']; ?></label>
                        </button>
                        <div class="dropdown">
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Edit Account</a></li>
                                <li><a class="dropdown-item" href="#">Delete Account</a></li>
                                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </div> -->
            <?php
            } ?>
        </div>
    </div>
</div>

<script>

$(document).ready(function() {


$(document).on('input', '#search-input', () => {
    var searchQuery = $('#search-input').val();
    $.ajax({
        url: '/search',
        method: 'GET',
        data: {
            search : searchQuery
        },
        success: (response) => {
            var searchResults = $('#search-results');
            var result = response.result
            console.log(result.length)
            searchResults.empty();
            if(result != '') {
                var htmlElements = ''

            for(var i = 0; i < result.length; i++) {
                htmlElements += `<div class="row py-2" id="search_result"><a href="/rooms/${result[i].id}"><div class="col"><i class="bi bi-search me-3 my-4"></i>${result[i].room_name}</div></div>`
            }

            searchResults.append(htmlElements);
            var searchBarOffset = $('#search-input').offset();
            var searchBarHeight = $('#search-input').outerHeight();
            searchResults.css({
                top: searchBarOffset.top + searchBarHeight,
                left: searchBarOffset.left
              });
              searchResults.show();
            }
            else {
                searchResults.hide();
            }
        }
    })
})


})

</script>

