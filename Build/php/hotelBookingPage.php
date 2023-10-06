<?php
session_start();

include("connection.php");
include_once("functions.php");

//$user_data = check_login($con);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="Build/images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/tailwind.css">
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" href="../images/hotelfavicon.ico" type="image/x-icon">
    <title>Hotel - Booking Page</title>
</head>

<body>
    <!------------NAVBAR--------->
    <div class="bg-white">
        <header class="absolute inset-x-0 top-0 z-50">
            <nav class="flex items-center justify-between p-6 lg:px-8" aria-label="Global">
                <div class="flex items-center lg:flex-1">
                    <a href="#" class="flex items-center"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                            <path d="M0 32C0 14.3 14.3 0 32 0H480c17.7 0 32 14.3 32 32s-14.3 32-32 32V448c17.7 0 32 14.3 32 32s-14.3 32-32 32H304V464c0-26.5-21.5-48-48-48s-48 21.5-48 48v48H32c-17.7 0-32-14.3-32-32s14.3-32 32-32V64C14.3 64 0 49.7 0 32zm96 80v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V112c0-8.8-7.2-16-16-16H112c-8.8 0-16 7.2-16 16zM240 96c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V112c0-8.8-7.2-16-16-16H240zm112 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V112c0-8.8-7.2-16-16-16H368c-8.8 0-16 7.2-16 16zM112 192c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V208c0-8.8-7.2-16-16-16H112zm112 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V208c0-8.8-7.2-16-16-16H240c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V208c0-8.8-7.2-16-16-16H368zM328 384c13.3 0 24.3-10.9 21-23.8c-10.6-41.5-48.2-72.2-93-72.2s-82.5 30.7-93 72.2c-3.3 12.8 7.8 23.8 21 23.8H328z" />
                        </svg>
                        <span class="self-center text-2xl pl-4 font-semibold whitespace-nowrap dark:text-black-400">Hotel</span>
                    </a>
                </div>
                <div class="flex lg:hidden">
                    <button type="button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700" id="openButton">
                        <span class="sr-only">Open main menu</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                    </button>
                </div>
                <div class="hidden lg:flex lg:flex-1 justify-center lg:gap-x-12" id="openMenuItems">
                    <a href="../../index.php" class="text-sm font-semibold leading-6 text-gray-900 hover:underline">Back to Home</a>
                </div>
                <?php
                show_login();
                ?>
            </nav>
            <!-- Mobile menu, show/hide based on menu open state. -->
            <div class="hidden" role="dialog" aria-modal="true" id="menuItems">
                <!---Background backdrop, show/hide based on slide-over state. -->
                <div class="fixed inset-0 z-50"></div>
                <div class="fixed inset-y-0 right-0 z-50 w-full overflow-y-auto bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
                    <div class="flex items-center justify-between">
                        <button type="button" class="-m-2.5 rounded-md p-2.5 text-gray-700" id="toggleButtonClose">
                            <span class="sr-only">Close menu</span>
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <div class="mt-6 flow-root">
                        <div class="-my-6 divide-y divide-gray-500/10">
                            <div class="space-y-2 py-6">
                                <a href="../../index.php" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50 hover:underline">Back to Home</a>
                            </div>
                            <?php
                            if (isset($_SESSION['username'])) {
                                echo '<div class="lg:flex lg:flex-1 lg:justify-end">';
                                echo '<span class="text-sm font-semibold leading-6 text-gray-900 hover:underline">' . $_SESSION['username'] . '</span>';
                                echo '<form action="./Build/php/logout.php" method="post">';
                                echo '<input type="submit" value="Logout" class="hover:underline mt-5">';
                                echo '</form>';
                                echo '</div>';
                            } else {
                                // If the user is not logged in, show the login button
                                echo '<div class="lg:flex lg:flex-1 lg:justify-end">';
                                echo '<a href="./Build/php/loginPage.php" class="text-sm font-semibold leading-6 text-gray-900 hover:underline">Log in<span aria-hidden="true"></span></a>';
                                echo '</div>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-------HERO SECTION----->
        <div class="relative isolate px-6 pt-14 lg:px-8" id="hero-section">
            <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80" aria-hidden="true">
                <div class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-b from-pink-400 via-rose-200 to-red-200 opacity-30 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
            </div>
            <div class="absolute inset-x-0 top-[calc(100%-13rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)]" aria-hidden="true">
                <div class="relative left-[calc(50%+3rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 bg-gradient-to-b from-pink-400 via-rose-200 to-red-200 opacity-30 sm:left-[calc(50%+36rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
            </div>
        </div>
    </div>


    <!----HOTEL BOOKING FORM--->
    <div class="w-2/3 mx-auto py-32 sm:py-48 lg:py-56" id="hotel-form">
        <div class="relative block text-center mb-8">
            <span class="mx-auto text-3xl font-bold">Hotel Reservation</span>
        </div>

        <div data-tab-content="" class="p-5">
            <div class="block opacity-100" id="app" role="tabpanel">
                <p class="block font-sans text-base font-light leading-relaxed text-inherit text-gray-500 antialiased">
                <form class="m-auto bg-white drop-shadow-lg rounded-lg overflow-hidden  accent-gray-800" id="bookRoom" onsubmit="return bookRoom(); return false">
                    <div class="p-6">
                        <div class="flex-1 max-xs:flex-col gap-4">
                            <div class="mt-4 relative ">
                                <div class="absolute top-0 left-0 w-8 h-8 flex justify-center items-center">
                                    <i class="fa fa-location-arrow"></i>
                                </div>
                                <input class="w-full bg-gray-100 text-xs font-bold border-none py-2 pl-8 pr-4 rounded placeholder:text-gray-800" placeholder="Search by city, hotel, or neighborhood" type="text" id="origin" required>
                            </div>
                        </div>
                        <div class="flex max-xs:flex-col gap-4 mt-4">
                            <div class="flex-1 relative">
                                <div class="absolute top-0 left-0 w-8 h-8 flex justify-center items-center">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input class="w-full bg-gray-100 text-xs font-bold border-none py-2 pl-8 pr-4 rounded placeholder:text-gray-800" type="text" placeholder="From" id="start_date" onfocus="(this.type='date')" required>
                            </div>
                            <div class="flex-1 relative">
                                <div class="absolute top-0 left-0 w-8 h-8 flex justify-center items-center">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input class="w-full bg-gray-100 text-xs font-bold border-none py-2 pl-8 pr-4 rounded placeholder:text-gray-800" type="text" placeholder="To" id="end_date" onfocus="(this.type='date')" required>
                            </div>
                        </div>
                        <div class="flex max-xs:flex-col gap-4 mt-4">
                            <div class="flex-1 relative">
                                <div class="absolute top-0 left-0 w-8 h-8 flex justify-center items-center">
                                    <i class="fa fa-user"></i>
                                </div>
                                <select id="adults" name="adults" class="w-full bg-gray-100 text-xs font-bold border-none py-2 pl-8 pr-4 rounded placeholder:text-gray-800" required>
                                    <option value="1">1 Guest</option>
                                    <option value="2">2 Guest</option>
                                    <option value="3">3 Guest</option>
                                </select>
                            </div>
                        </div>
                        <div class="flex max-xs:flex-col gap-4 mt-4">
                            <div class="flex-1 relative">
                                <div class="absolute top-0 left-0 w-8 h-8 flex justify-center items-center">
                                    <i class="fa fa-bed"></i>
                                </div>
                                <select id="roomType" name="roomType" class="w-full bg-gray-100 text-xs font-bold border-none py-2 pl-8 pr-4 rounded placeholder:text-gray-800" required>
                                    <option value="Single">Single</option>
                                    <option value="Double">Double</option>
                                    <option value="Deluxe">Deluxe</option>
                                    <option value="Deluxe">Suite</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div>
                        <button class="bg-gray-800 uppercase py-4 w-full text-white text-xs tracking-widest">Search Hotels</button>
                    </div>
                </form>
                </p>

                <!----Hotel Card Showing results--->
                <div class="w-2/3 mx-auto bg-white shadow-lg rounded-lg overflow-hidden mt-5">
                    <div class="flex">
                        <img class="w-1/3" src="../images/hotelResultCard.jpg" alt="hotel image">
                        <div class="w-2/3 p-4">
                            <h2 class="text-xl font-semibold mb-2" id="hotel_name">Hotel Name</h2>
                            <p class="text-gray-900" id="hotel_address">Address</p>
                            <div class="flex mb-2">
                                <span class="text-yellow-500">★</span>
                                <span class="text-yellow-500">★</span>
                                <span class="text-yellow-500">★</span>
                                <span class="text-yellow-500">★</span>
                                <span class="text-yellow-500">☆</span>
                            </div>
                            <div class="flex mb-2">
                                <span class="mr-2"><i class="fa fa-wifi mr-1" aria-hidden="true"></i>Free Wi-Fi</span>
                                <span class="mr-2"><i class="fa fa-camera mr-1" aria-hidden="true"></i>CCTV Camera</span>
                                <span class="mr-2"><i class="fa fa-television mr-1" aria-hidden="true"></i>TV</span>
                            </div>
                            <div class="flex mb-2">
                                <p><i class="fa fa-info-circle mr-1" aria-hidden="true" id="description"></i>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti accusamus consectetur explicabo iusto nihil eum.</p>
                            </div>
                            <div class="text-xl font-semibold mb-2" id="price"></div>
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Book Now</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
    </div>
    <div class="absolute inset-x-0 top-[calc(100%-13rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)]" aria-hidden="true">
        <div class="relative left-[calc(50%+3rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2  bg-gradient-to-b from-pink-400 via-rose-200 to-red-200 opacity-30 sm:left-[calc(50%+36rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
    </div>


    <!-----------------Footer----------------->
    <footer class="bg-white rounded-lg m-4">
        <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
            <div class="sm:flex sm:items-center sm:justify-between">
                <a href="../../index.php" class="flex items-center mb-4 sm:mb-0">
                    <img src="../images/navbar-photo.png" class="h-8 mr-3" alt="company-logo" />
                    <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-black">Fly</span>
                </a>
                <ul class="flex flex-wrap items-center mb-6 text-sm font-medium text-gray-500 sm:mb-0 dark:text-white-400">
                    <li>
                        <a href="../../index.php#about-us-content" class="mr-4 hover:underline md:mr-6 ">About</a>
                    </li>
                    <li>
                        <a href="../php/contactPage.php" class="hover:underline">Contact</a>
                    </li>
                </ul>
            </div>
            <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
            <span class="block text-sm text-gray-500 sm:text-center dark:text-white-400">© 2023 <a href="../../index.php" class="hover:underline">Fly™</a>. All Rights Reserved.</span>
        </div>
    </footer>

    <script src="../JS/script.js"></script>
</body>

</html>