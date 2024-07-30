<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Centro de salud fermoza</title>
</head>

<body>

    <?php
    include('plantillas/header_index.php');
    ?>

    <nav class="nav-container">
        <ul id="nav-links">
            <li><a href="#" class="links">Inico</a></li>
            <li><a href="#quienes_somos" class="links">Quienes Somos?</a></li>
            <li><a href="#profesionales" class="links">Profesionales</a></li>
            <li><a href="#especialidades" class="links">Especialidades</a></li>
            <li><a href="login/login.php" class="links">Acceso</a></li>
        </ul>
    </nav>

    <section class="secciones">
        <section id="quienes_somos">

            <div>
                <img src="profesionales.png">
            </div>
            <div>
                <h2>¿Quienes Somos?</h2>

                <p> En el Centro de Salud Fermoza, nos enorgullece ser un equipo de profesionales apasionados y comprometidos con el bienestar y la salud de nuestra comunidad. Desde nuestra fundación, hemos trabajado incansablemente para proporcionar servicios de salud de alta calidad, accesibles y personalizados para cada uno de nuestros pacientes.</p>
                <p>Nuestro equipo está compuesto por médicos especialistas, enfermeros, terapeutas y personal administrativo, todos ellos dedicados a brindar una atención integral y compasiva. Creemos firmemente en la importancia de la prevención, la educación y el tratamiento holístico para alcanzar un estado óptimo de salud.</p>
            </div>

        </section>
    </section>


    <section id="profesionales">
        <h2>Nuestros Profesionales</h2>
        <div class="swiper mySwiper">

            <div class="swiper-wrapper">
                <div class="card swiper-slide">
                    <div class="card__image">
                        <img src="images/person_1_sm.jpg" alt="card image">
                    </div>

                    <div class="card__content">
                        <span class="card__title">Web Designer</span>
                        <span class="card__name">Vanessa Martinez</span>
                        <p class="card__text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sit veritatis labore provident non tempora odio est sunt, ipsum</p>
                    </div>
                </div>

                <div class="card swiper-slide">
                    <div class="card__image">
                        <img src="images/person_2_sm.jpg" alt="card image">
                    </div>

                    <div class="card__content">
                        <span class="card__title">Ui Designer</span>
                        <span class="card__name">Sarah Bowen</span>
                        <p class="card__text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sit veritatis labore provident non tempora odio est sunt, ipsum</p>
                    </div>
                </div>

                <div class="card swiper-slide">
                    <div class="card__image">
                        <img src="images/person_3_sm.jpg" alt="card image">
                    </div>

                    <div class="card__content">
                        <span class="card__title">Web Developer</span>
                        <span class="card__name">David Murphy</span>
                        <p class="card__text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sit veritatis labore provident non tempora odio est sunt, ipsum</p>
                    </div>
                </div>

                <div class="card swiper-slide">
                    <div class="card__image">
                        <img src="images/person_1_sm.jpg" alt="card image">
                    </div>

                    <div class="card__content">
                        <span class="card__title">Mobile Designer</span>
                        <span class="card__name">Kelsey West</span>
                        <p class="card__text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sit veritatis labore provident non tempora odio est sunt, ipsum</p>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <section id="especialidades">

        <h2>Especialidades</h2>
        <div class="projcard-container">

            <div class="projcard projcard-blue">
                <div class="projcard-innerbox">
                    <img class="projcard-img" src="https://picsum.photos/800/600?image=1041" />
                    <div class="projcard-textbox">
                        <div class="projcard-title">Card Title</div>
                        <div class="projcard-subtitle">This explains the card in more detail</div>
                        <div class="projcard-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
                    </div>
                </div>
            </div>

            <div class="projcard projcard-red">
                <div class="projcard-innerbox">
                    <img class="projcard-img" src="https://picsum.photos/800/600?image=1080" />
                    <div class="projcard-textbox">
                        <div class="projcard-title">That's Another Card</div>
                        <div class="projcard-subtitle">I don't really think that I need to explain anything here</div>
                        <div class="projcard-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
                    </div>
                </div>
            </div>

            <div class="projcard projcard-green">
                <div class="projcard-innerbox">
                    <img class="projcard-img" src="https://picsum.photos/800/600?image=1039" />
                    <div class="projcard-textbox">
                        <div class="projcard-title">And a Third Card</div>
                        <div class="projcard-subtitle">You know what this is by now</div>
                        <div class="projcard-description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident.</div>
                    </div>
                </div>
            </div>

            <div class="projcard projcard-customcolor" style="--projcard-color: #F5AF41;">
                <div class="projcard-innerbox">
                    <img class="projcard-img" src="https://picsum.photos/800/600?image=943" />
                    <div class="projcard-textbox">
                        <div class="projcard-title">Last Card</div>
                        <div class="projcard-subtitle">That's the last one. Have a nice day!</div>
                        <div class="projcard-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</div>
                    </div>
                </div>
            </div>

        </div>

    </section>

    <?php
    include('plantillas/footer.php');
    ?>

    <script>
        var swiper = new Swiper(".mySwiper", {
            effect: "coverflow",
            grabCursor: true,
            centeredSlides: true,
            slidesPerView: "auto",
            coverflowEffect: {
                rotate: 0,
                stretch: 0,
                depth: 300,
                modifier: 1,
                slideShadows: false,
            },
            pagination: {
                el: ".swiper-pagination",
            },
        });
    </script>

</body>

</html>