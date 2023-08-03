<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <title>Data PDF</title>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Noto+Sans:wght@400;700&display=swap");
        :root {
        --white: #fff;
        --darkblue: #1b4965;
        --lightblue: #edf2f4;
        }
        
        * {
        padding: 0;
        margin: 0;
        }
        
        body {
        margin: 50px 0 150px;
        font-family: "Noto Sans", sans-serif;
        }
        
        .container {
        max-width: 1000px;
        padding: 0 15px;
        margin: 0 auto;
        }
        
        h1 {
        font-size: 1.5em;
        }
        
        /* TABLE STYLES
        –––––––––––––––––––––––––––––––––––––––––––––––––– */
        .table-wrapper {
        overflow-x: auto;
        }
        
        .table-wrapper::-webkit-scrollbar {
        height: 8px;
        }
        
        .table-wrapper::-webkit-scrollbar-thumb {
        background: var(--darkblue);
        border-radius: 40px;
        }
        
        .table-wrapper::::-webkit-scrollbar-track {
        background: var(--white);
        border-radius: 40px;
        }
        
        .table-wrapper table {
        margin: 50px 0 20px;
        border-collapse: collapse;
        text-align: center;
        }
        
        .table-wrapper table th,
        .table-wrapper table td {
        padding: 10px;
        min-width: 75px;
        }
        
        .table-wrapper table th {
        color: var(--white);
        background: var(--darkblue);
        }
        
        .table-wrapper table tbody tr:nth-of-type(even) > * {
        background: var(--lightblue);
        }
        
        .table-wrapper table td:first-child {
        display: grid;
        grid-template-columns: 25px 1fr;
        grid-gap: 10px;
        text-align: left;
        }
        
        .table-credits {
        font-size: 12px;
        margin-top: 10px;
        }
        
        /* FOOTER STYLES
        –––––––––––––––––––––––––––––––––––––––––––––––––– */
        .page-footer {
        position: fixed;
        right: 0;
        bottom: 50px;
        display: flex;
        align-items: center;
        padding: 5px;
        z-index: 1;
        background: var(--white);
        }
        
        .page-footer a {
        display: flex;
        margin-left: 4px;
        }

    </style>
</head>

<body>

   <div class="container">
    <h1>Product Ditels</h1>
    <div class="table-wrapper">
        <table>
            <thead>
                <tr >
                    <th>Product Name</th>
                    <th>Brand Name</th>
                    <th>Original Price</th>
                    <th>Selling Price</th>
                    {{-- <th>Image</th> --}}
                    <th>Warranty Year</th>
                    <th>Quantity</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>
                            <span>
                                <span class="fi fi-af"></span>
                            </span>
                            <span>{{ $product->name }}</span>
                        </td>
                        <td>{{ $product->brand }}</td>
                        <td>{{ $product->original_price }}</td>
                        <td>{{ $product->selling_price }}</td>
                        {{-- <td><img src="{{ asset('/uploads/product/'.$product->image)}}" style="width: 30px " alt=""></td> --}}
                        <td>{{ $product->warranty_year }}</td>
                        <td>{{ $product->quantity }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<footer class="page-footer">
    <span>Made by </span>
    <a href="#" target="_blank">
        {{-- <img width="24" height="24" src="https://assets.codepen.io/162656/george-martsoukos-small-logo.svg"
            alt="George Martsoukos logo"> --}}
        <h3>Nayan Gundaliya</h3>
    </a>
</footer>

</body>

</html>