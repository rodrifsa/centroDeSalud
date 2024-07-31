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
                        <img src="images/medica1.png" alt="card image">
                    </div>

                    <div class="card__content">
                        <span class="card__title">Dra. Vanesa Shimura</span>
                        <br>
                        <span class="card__name"><strong>Pediatra</strong></span>
                    </div>
                </div>

                <div class="card swiper-slide">
                    <div class="card__image">
                        <img src="images/medico2.png" alt="card image">
                    </div>

                    <div class="card__content">
                        <span class="card__title">Dr. Luis Petri</span>
                        <br>
                        <span class="card__name"><strong>Neurólogo</strong></span>
                    </div>
                </div>

                <div class="card swiper-slide">
                    <div class="card__image">
                        <img src="images/medico3.png" alt="card image">
                    </div>

                    <div class="card__content">
                        <span class="card__title">Dr. Sanjeev Bhaskar</span>
                        <br>
                        <span class="card__name"><strong>Nefrólogo</strong></span>
                    </div>
                </div>

                <div class="card swiper-slide">
                    <div class="card__image">
                        <img src="images/medico4.png" alt="card image">
                    </div>

                    <div class="card__content">
                        <span class="card__title">Dr. Ronald Espinoza</span>
                        <br>
                        <span class="card__name"><strong>Oncólogo</strong></span>
                    </div>
                </div>
                

            </div>

            <div class="swiper-wrapper">
                <div class="card swiper-slide">
                    <div class="card__image">
                        <img src="images/medica5.png" alt="card image">
                    </div>

                    <div class="card__content">
                        <span class="card__title">Dra. Larisa Robles</span>
                        <br>
                        <span class="card__name"><strong>Ginecóloga</strong></span>
                    </div>
                </div>

                <div class="card swiper-slide">
                    <div class="card__image">
                        <img src="images/medica6.png" alt="card image">
                    </div>

                    <div class="card__content">
                        <span class="card__title">Dra. Mary Maynard</span>
                        <br>
                        <span class="card__name"><strong>Traumatóloga</strong></span>
                    </div>
                </div>

                <div class="card swiper-slide">
                    <div class="card__image">
                        <img src="images/medico7.png" alt="card image">
                    </div>

                    <div class="card__content">
                        <span class="card__title">Dr. Mario Scali</span>
                        <br>
                        <span class="card__name"><strong>Urólogo</strong></span>
                    </div>
                </div>

                <div class="card swiper-slide">
                    <div class="card__image">
                        <img src="images/medica8.png" alt="card image">
                    </div>

                    <div class="card__content">
                        <span class="card__title">Dra. Jessica Ramirez</span>
                        <br>
                        <span class="card__name"><strong>Dentista</strong></span>
                </div>
                

            </div>
        </div>
    </section>


    <section id="especialidades">

        <h2>Especialidades</h2>
        <div class="projcard-container">

            <div class="projcard projcard-blue">
                <div class="projcard-innerbox">
                    <img class="projcard-img" src="./images/espe_pediatria.png" />
                    <div class="projcard-textbox">
                        <div class="projcard-title">Pediatría</div>
                        <div class="projcard-subtitle"></div>
                        <div class="projcard-description">Nuestros pediatras realizan chequeos regulares, vacunaciones, y tratan enfermedades infantiles, asegurando el desarrollo saludable del niño.</div>
                    </div>
                </div>
            </div>

            <div class="projcard projcard-red">
                <div class="projcard-innerbox">
                    <img class="projcard-img" src="./images/espe_neurologia.png" />
                    <div class="projcard-textbox">
                        <div class="projcard-title">Neurología</div>
                        <div class="projcard-subtitle"></div>
                        <div class="projcard-description">Nuestros neurólogos tratan enfermedades como epilepsia, migrañas, esclerosis múltiple y trastornos neurodegenerativos, utilizando estudios como electroencefalogramas (EEG) y resonancias magnéticas (RM).</div>
                    </div>
                </div>
            </div>

            <div class="projcard projcard-green">
                <div class="projcard-innerbox">
                    <img class="projcard-img" src="./images/espe_nefrologia.png" />
                    <div class="projcard-textbox">
                        <div class="projcard-title">Nefrología</div>
                        <div class="projcard-subtitle"></div>
                        <div class="projcard-description">Nuestros nefrólogos manejan condiciones como insuficiencia renal, hipertensión y enfermedades renales crónicas, ofreciendo tratamientos como diálisis y trasplantes de riñón.</div>
                    </div>
                </div>
            </div>

            <div class="projcard projcard-customcolor" style="--projcard-color: #F5AF41;">
                <div class="projcard-innerbox">
                    <img class="projcard-img" src="./images/espe_oncologia.png" />
                    <div class="projcard-textbox">
                        <div class="projcard-title">Oncología</div>
                        <div class="projcard-subtitle"></div>
                        <div class="projcard-description">Nuestros oncólogos proporcionan diagnóstico, tratamiento y seguimiento de pacientes con cáncer, utilizando quimioterapia, radioterapia y cirugía, además de terapias dirigidas y de inmunoterapia.</div>
                    </div>
                </div>
            </div>

            <div class="projcard projcard-blue">
                <div class="projcard-innerbox">
                    <img class="projcard-img" src="./images/espe_ginecologia.png" />
                    <div class="projcard-textbox">
                        <div class="projcard-title">Ginecología</div>
                        <div class="projcard-subtitle"></div>
                        <div class="projcard-description">Nuestras ginecólogas y ginecólogos realizan chequeos regulares, tratan trastornos menstruales, infecciones y problemas de fertilidad, además de realizar procedimientos quirúrgicos cuando es necesario.</div>
                    </div>
                </div>
            </div>

            <div class="projcard projcard-blue">
                <div class="projcard-innerbox">
                    <img class="projcard-img" src="./images/espe_traumatologia.png" />
                    <div class="projcard-textbox">
                        <div class="projcard-title">Traumatología</div>
                        <div class="projcard-subtitle"></div>
                        <div class="projcard-description">Nuestros traumatólogos manejan fracturas, esguinces, lesiones deportivas y otros traumas, utilizando tanto tratamientos conservadores como quirúrgicos para la rehabilitación y recuperación.</div>
                    </div>
                </div>
            </div>

            <div class="projcard projcard-blue">
                <div class="projcard-innerbox">
                    <img class="projcard-img" src="./images/espe_urologo.png" />
                    <div class="projcard-textbox">
                        <div class="projcard-title">Urología</div>
                        <div class="projcard-subtitle"></div>
                        <div class="projcard-description">Nuestros urólogos diagnostican y tratan afecciones como infecciones urinarias, incontinencia, cálculos renales y problemas prostáticos, ofreciendo también cirugías urológicas cuando es necesario.</div>
                    </div>
                </div>
            </div>

            <div class="projcard projcard-blue">
                <div class="projcard-innerbox">
                    <img class="projcard-img" src="./images/espe_dentistas.png" />
                    <div class="projcard-textbox">
                        <div class="projcard-title">Salud Bucal</div>
                        <div class="projcard-subtitle"></div>
                        <div class="projcard-description">Nuestros dentistas realizan limpiezas, chequeos, empastes, extracciones, y tratamientos para enfermedades de las encías, además de ofrecer servicios de ortodoncia y estética dental.</div>
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