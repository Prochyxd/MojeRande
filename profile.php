<!-- 
    Lexa hledá ženu ❤️

Protože je Lexa žádaný a fešný chlapík, pravidelně chodí na randíčka. 
Bohužel se v nich ztrácí a má v tom obecně velký nepořádek. 
Potřebuje proto evidovat ženy, se kterými randí. 
Vytvořte webovou aplikaci a pomozte tak Lexovi najít znovu smysl a naději na lepší zítřky plné lásky.

Vaše aplikace bude obsahovat následující:

    jméno a příjmení ženy, věk ženy, popis ženy
    rande s danou ženou (popis toho, jak rande šlo, datum, kdy na rande byli, a kde).

Aplikace bude také umět:

    přidat novou ženu a přidat nové rande
    smazat záznam o ženě a smazat záznam o randíčku
    upravit záznam o ženě a upravit záznam o randíčku.

Lexa bude mít možnost si ženy seřadit v abecedním pořadí a zároveň i podle toho, 
kdy se s ženou naposledy viděl/psal si (nejstarší/nejnovější interakce). 
Samozřejmě Lexa nechce, aby měl k jeho aplikaci přístup někdo jiný, 
proto se k datům dostane pouze skrze své přihlašovací údaje.
-->


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="styles/settings.css">
    <title>🖤 Chci rande! 🧡</title>
</head>

<body>
    <!--NAVBAR-->
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="../Lexa/index.php"><img src="../Lexa/img/logo.png" width="200px"
                    height="50px"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="../Lexa/home.php">Domu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../Lexa/date.php">Chci rande!</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../Lexa/help.php">Podpora</a>
                    </li>
                </ul>
                <ul class="navbar-nav mt-2 mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="../Lexa/settings.php">Nastavení</a>
                    </li>
                    <li class="nav-item">
                        <p class="navbar-text">Přihlášen:</p>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../Lexa/profile.php">Karel</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5 mb-5">
        <div class="row gutters">
            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="account-settings">
                            <div class="user-profile">
                                <div class="user-avatar">
                                    <img src="" alt="Profile picture">
                                </div>
                                <h5 class="user-name">Matyáš Závora</h5>
                                <h6 class="user-email">zavora@smrdi.com</h6>
                            </div>
                            <div class="about">
                                <h5 class="mb-2 text-light">O mně:</h5>
                                <p>Já jsem matyáš a tady nemůže být dlouhý text, protože to pak v těch kartách bude
                                    vypadat blbě</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Telefon</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                123 456 789
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Místo bydliště</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                Praha
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Další informace</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                Random
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Další informace</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                Random
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Další informace</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                Random
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Další informace</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                Random
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Další informace</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                Random
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-12">
                                <a class="btn btn-primary " target="__blank" href="../Lexa/settings.html">Upravit</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--FOOTER-->
    <footer class="p-5 bg-dark text-white text-center position-relative">
        <div class="container">
            <p class="lead">Copyright &copy; PROCHY</p>
            <a href="#" class="position-absolute bottom-0 end-0 p-5"><i class="bi-arrow-up-circle h1"></i></a>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>
</body>

</html>