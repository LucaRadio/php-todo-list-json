<?php


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.2.2/axios.min.js" integrity="sha512-QTnb9BQkG4fBYIt9JGvYmxPpd6TBeKp6lsUrtiVQsrJ9sb33Bn9s0wMQO9qVBFbPX3xHRAsBHvXlcsrnJjExjg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="bg-dark">
    <div id="app">
        <div class="container text-center">
            <h1 class="text-warning my-4">Programming language to learn</h1>
            <p class="fs-4 text-white mb-5">
                There's a ToDoList where you can follow your learning about programming language
            </p>
            <div class="row flex-column align-items-center">
                <div class="bg-white col-5 mb-3">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item text-start p-0 d-flex align-items-center" v-for="singleLang,i in ListPL">
                            <div class="img-container me-3">
                                <img :src="singleLang.logo" alt="">
                            </div>
                            <div class="input-group my-2 d-flex align-items-center">
                                <span @click="checkedItem(singleLang)" :class="singleLang.done ? 'text-decoration-line-through':''" class="me-auto">{{singleLang.name}}</span>
                                <button @click="deleteItem(i)" class="input-group-text bg-danger" id="basic-addon2"><i class=" text-white fa-solid fa-trash"></i></button>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-5">
                    <form @submit.prevent="insertNew" method="POST" class="input-group" action="./api/newPLang.php">
                        <input require type="text" class="form-control shadow-none" placeholder="Insert a programming language to learn" name="language" v-model="newLang">
                        <button class="btn btn-warning">Add</button>
                    </form>
                </div>
            </div>

        </div>


    </div>



    <script src="js/main.js"></script>
</body>

</html>