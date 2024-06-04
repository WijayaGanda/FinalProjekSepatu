@extends('layouts.app')
@section('content')
    <style>
        .carousel-item img {
            max-width: 50%;
            /* Adjust the width as needed */
            max-height: 300px;
            /* Adjust the height as needed */
            object-fit: contain;
            /* Maintain aspect ratio */
            padding-bottom: 5em;
        }

        .product-list {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            /* Space between cards */
            list-style-type: none;
            /* Remove default list styling */
            padding: 0;
            /* Remove default padding */
            margin: 0;
            /* Remove default margin */
        }

        .product-item {
            width: 320px;
            /* Adjust as needed */
            border: 1px solid #ffffff;
            /* Optional: Add a border for better visualization */
            padding: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.664);
            /* Optional: Add a shadow for better visualization */
        }

        .product-image-container {
            width: 100%;
        }

        .product-image-wrapper {
            padding-bottom: 100%;
            position: relative;
        }

        .product-image-photo {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .center-text {
            font-family: cursive;
            text-align: center;
            padding-bottom: 1em;
        }

        .product-item-details {
            text-align: center;
        }

        .quotes {
            text-align: center;
            padding-top: 3em;
            padding-bottom: 1em;
        }

        .stock {
            text-align: end;
        }

        .hello {
            background-color: rgb(255, 255, 255);
        }
    </style>

    <div class="hello">
        <b>
            <h1 class="center-text">Shoes Branch</h1>
        </b>
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="nike.png" class="d-block w-50 mx-auto" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="converse.png" class="d-block w-50 mx-auto" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="adidas.png" class="d-block w-50 mx-auto" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="skechers.png" class="d-block w-50 mx-auto" alt="...">
                </div>
            </div>
        </div>
    </div>

    <br>

    <strong>
        <h1 class="text-center"> Just Get Your New Shoes!</h1>
    </strong>
    <br>

    <div class="d-flex justify-content-center">
        <ul class="product-list">
            <li class="product-item">
                <div class="product-item-photo">
                    <span class="product-image-container">
                        <span class="product-image-wrapper">
                            <img src="underarmour2.jpg" loading="lazy" width="300" height="300"
                                alt="Under Armour UA Curry 4 - B&W">
                        </span>
                    </span>
                </div> <br>
                <div class="stock">
                    <b>
                        <p class="text-primary"><span class="stock-label">Stock :</span>
                            <span class="amount-stock">70</span>
                        </p>
                    </b>
                </div>
                <hr>
                <div class="product-item-details">
                    <strong class="product-item-name">
                        Under Armour UA Curry 4 - B&W
                    </strong>
                    <hr>
                    <div class="price-wrapper-container">
                        <div class="category-wrapper-container">
                            <span class="category">Male Shoes</span>
                        </div>
                    </div>
                    <div class="discount">Marketama Indah</div>
                </div>
            </li>

            <li class="product-item">
                <div class="product-item-photo">
                    <span class="product-image-container">
                        <span class="product-image-wrapper">
                            <img src="converseblue.jpg" loading="lazy" width="300" height="300" alt="converse-blue">
                        </span>
                    </span>
                </div> <br>
                <div class="stock">
                    <b>
                        <p class="text-primary"><span class="stock-label">Stock :</span>
                            <span class="amount-stock">150</span>
                        </p>
                    </b>
                </div>
                <hr>
                <div class="product-item-details">
                    <strong class="product-item-name">
                        Chuck Taylor All Star - Blue
                    </strong>
                    <hr>
                    <div class="price-wrapper-container">
                        <div class="category-wrapper-container">
                            <span class="category">Female Shoes</span>
                        </div>
                    </div>
                    <div class="discount">Outomount</div>
                </div>
            </li>

            <li class="product-item">
                <div class="product-item-photo">
                    <span class="product-image-container">
                        <span class="product-image-wrapper">
                            <img src="skechershoes.jpeg" loading="lazy" width="300" height="300" alt="converse-blue">
                        </span>
                    </span>
                </div> <br>
                <div class="stock">
                    <b>
                        <p class="text-primary"><span class="stock-label">Stock :</span>
                            <span class="amount-stock">110</span>
                        </p>
                    </b>
                </div>
                <hr>
                <div class="product-item-details">
                    <strong class="product-item-name">
                        Skechers Go Run - White Blue
                    </strong>
                    <hr>
                    <div class="price-wrapper-container">
                        <div class="category-wrapper-container">
                            <span class="category">Female Shoes</span>
                        </div>
                    </div>
                    <div class="discount">Nice So</div>
                </div>
            </li>

            <li class="product-item">
                <div class="product-item-photo">
                    <span class="product-image-container">
                        <span class="product-image-wrapper">
                            <img src="adistar2.jpeg" loading="lazy" width="300" height="300" alt="converse-blue">
                        </span>
                    </span>
                </div> <br>
                <div class="stock">
                    <b>
                        <p class="text-primary"><span class="stock-label">Stock :</span>
                            <span class="amount-stock">79</span>
                        </p>
                    </b>
                </div>
                <hr>
                <div class="product-item-details">
                    <strong class="product-item-name">
                        Adidas Adistar 2 - B&W
                    </strong>
                    <hr>
                    <div class="price-wrapper-container">
                        <div class="category-wrapper-container">
                            <span class="category">Kids Shoes</span>
                        </div>
                    </div>
                    <div class="discount">Planet Sport Kids</div>
                </div>
            </li>

            <li class="product-item">
                <div class="product-item-photo">
                    <span class="product-image-container">
                        <span class="product-image-wrapper">
                            <img src="nikeair.jpg" loading="lazy" width="300" height="300" alt="converse-blue">
                        </span>
                    </span>
                </div> <br>
                <div class="stock">
                    <b>
                        <p class="text-primary"><span class="stock-label">Stock :</span>
                            <span class="amount-stock">79</span>
                        </p>
                    </b>
                </div>
                <hr>
                <div class="product-item-details">
                    <strong class="product-item-name">
                        Nike Air Force 1 - Low
                    </strong>
                    <hr>
                    <div class="price-wrapper-container">
                        <div class="category-wrapper-container">
                            <span class="category">Male Shoes</span>
                        </div>
                    </div>
                    <div class="discount">Marketama Indah</div>
                </div>
            </li>

            <li class="product-item">
                <div class="product-item-photo">
                    <span class="product-image-container">
                        <span class="product-image-wrapper">
                            <img src="airjordan4.jpg" loading="lazy" width="300" height="300" alt="converse-blue">
                        </span>
                    </span>
                </div> <br>
                <div class="stock">
                    <b>
                        <p class="text-primary"><span class="stock-label">Stock :</span>
                            <span class="amount-stock">79</span>
                        </p>
                    </b>
                </div>
                <hr>
                <div class="product-item-details">
                    <strong class="product-item-name">
                        Air Jordan 4 Retro - Grey
                    </strong>
                    <hr>
                    <div class="price-wrapper-container">
                        <div class="category-wrapper-container">
                            <span class="category">Male Shoes</span>
                        </div>
                    </div>
                    <div class="discount">Mayapada Group</div>
                </div>
            </li>
        </ul>
    </div>

    <div class="quotes">
        <i class="bi bi-quote">Shoes that Move with You, Wherever Life Takes You.</i>
    </div>
@endsection
