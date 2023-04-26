<?php 
require "../cfg/config.php"; ?>


<!DOCTYPE html>
<html class="" lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <link rel="icon" href="../img/logo.png">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../dist/style.css">
        <!-- <link rel="stylesheet" href="https://pyscript.net/latest/pyscript.css"/>
        <script defer src="https://pyscript.net/latest/pyscript.js"></script> -->
        <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;500;600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap">
        <title>AVG</title>
    </head>
    <body class="dark:bg-[#141518] dark:text-white">
      <?php
      $sql = "SELECT * FROM guestbook";
      $pre = $pdo->prepare($sql);
      $pre->bindParam('idMessage', $_POST['idMessage']);
      $pre->bindParam('pseudo', $_POST['pseudo']);
      $pre->bindParam('message', $_POST['message']);
      $pre->execute();
      $data = $pre->fetch(PDO::FETCH_ASSOC);

      $id = "#".$data["idMessage"];
      $pseudo = $data["pseudo"];
      $message = $data['message'];
  
      ?>  
        <!-- NAVBAR -->

        <!-- <div id="home">
            <div id="navbar" class="h-full w-[15%] bg-white">
                <ul class="absolute lg:flex lg:w-[50%] -z-10 flex flex-col gap-8 font-medium">
                    <li><a href="#" >Home</a></li>
                    <li><a href="#aboutMe" >About</a></li>
                    <li><a href="#skills" >Skills</a></li>
                    <li><a href="#projects" >Projects</a></li>
                    <li><a href="#game" >Games</a></li>
                    <li><a href="#contact" >Contact</a></li>
                </ul> -->


        
        <div id="sidenav-2" class=" hidden fixed left-0 top-0 z-[1035] h-screen container w-60 -translate-x-full overflow-hidden bg-white shadow-[0_4px_12px_0_rgba(0,0,0,0.07),_0_2px_4px_rgba(0,0,0,0.05)] data-[te-sidenav-hidden='false']:translate-x-0" data-te-sidenav-init data-te-sidenav-hidden="false" data-te-sidenav-mode="side" data-te-sidenav-content="#content">
            <ul class=" m-0 mx-auto text-center lg:flex lg:w-[50%] -z-10 flex flex-col gap-8 font-medium">
                <li class="p-2 hover:text-[#415446]"><a href="#" >Home</a></li>
                <li class="p-2 hover:text-[#415446]"><a href="#aboutMe" >About</a></li>
                <li class="p-2 hover:text-[#415446]"><a href="#skills" >Skills</a></li>
                <li class="p-2 hover:text-[#415446]"><a href="#projects" >Projects</a></li>
                <li class="p-2 hover:text-[#415446]"><a href="#game" >Games</a></li>
                <li class="p-2 hover:text-[#415446]"><a href="#contact" >GuestBook</a></li>
            </ul>
        </div>

            <nav class="dark:bg-[#1f2022] z-50 shadow-sm bg-white sm:min-w-full sticky content-center top-0 flex flex-row p-2 max-w-5xl items-center justify-between">
                <button
                    class="lg:hidden w-[30%] hover:text-[#415446] cursor-pointer text-xs font-medium leading-tight transition duration-150 ease-in-out"
                    data-te-sidenav-toggle-ref
                    data-te-target="#sidenav-2"
                    aria-controls="#sidenav-2"
                    aria-haspopup="true">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mx-auto w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                </button>
                
                <div class="w-[30%] lg:pl-48 ">
                    <a href="#"  aria-label="Page d'accueil du Portfolio"><img class="mx-auto w-24 sm:w-32 md:inline md:mr-4" src="../img/AVG-green.png" alt="logo Amandine Vialle-Guérin"></a>
                </div>
                
                <ul class="lg:visible hidden lg:flex lg:w-[50%] gap-8 font-medium">
                    <li class="hover:text-[#415446]"><a href="#" >Home</a></li>
                    <li class="hover:text-[#415446]"><a href="#aboutMe" >About</a></li>
                    <li class="hover:text-[#415446]"><a href="#skills" >Skills</a></li>
                    <li class="hover:text-[#415446]"><a href="#projects" >Projects</a></li>
                    <li class="hover:text-[#415446]"><a href="#game" >Games</a></li>
                    <li class="hover:text-[#415446]"><a href="#contact" >GuestBook</a></li>
                </ul>
                <a id="reverse" onclick="reverse()" href="#" class="cursor-pointer moon lg:w-[10%] lg:pl-0 w-[30%] hover:text-[#415446] dark:hidden ">   
                    
                    <img src="../img/recharger.png" class="hover:text-[#415446] mx-auto w-6 h-6">      
                </a>

                
                
            </nav>

            <!-- HOME  -->
            <div id="home" class="py-16 lg:px-32 pt-20 lg:pb-44 lg:flex lg:flex-row">
                <div class="lg:hidden grid place-content-center pb-10">
                    <img class="sm:h-96"src="../img/amandine.png" alt="Amandine Vialle-Guérin">
                </div> 
                <div class="flex flex-col lg:w-[60%] xl:w-[60%] lg:pt-16 mx-16 ">
                    <h1 class="text-3xl">Hey, I'm <span class="type"></span></h1>
                    <h2 class="text-5xl font-medium text-[#415446] py-2">Amandine Vialle-Guérin</h2>
                    <h3 class="text-2xl lg:py-3">Student at Guardia Cybersecurity School</h3>
                    <p class="lg:pr-36 text-lg">I am a 19 years old student, currently in bachelor at the Guardia Cybersecurity School of Lyon, FR.</p>
                    <a class="text-white rounded-2xl mt-5 w-32 p-4 bg-[#415446]" href="#contact">Contact Me</a>
                    
                    <div>
                        <a class="pt-16 xl:pt-48 text-lg flex flex-row" href="#aboutMe">
                            <img class="w-8" src="../img/souris.png" alt="Amandine Vialle-Guérin">
                            <p class="pl-3 mt-1">Scroll Down</p>
                            <img class=" mt-2 ml-2 h-4" src="../img/fleche.png" alt="Amandine Vialle-Guérin">
                        </a>
                        
                    </div>
                    
                    
                </div>
                <div class="lg:h-96 w-0 h-0 lg:w-[40%] xl:w-[30%]">
                    <img class="h-96 xl:h-[500px]"src="../img/amandine.png" alt="Amandine Vialle-Guérin">
                </div>
            </div>

        <!-- ABOUT ME -->
        <div>
            <h3 id="aboutMe" class="scroll-mt-24 text-4xl font-bold capitalize text-center mb-16" >About Me</h3>
            <div class="grid grid-cols-12">
                <div class="col-span-12 md:col-span-6 pb-10" >
                    <img class=" mx-auto rounded-3xl w-[70%] h-auto my-auto" src="../img/Photo de profil.jpg" alt="Amandine Vialle-Guérin">
                </div>

                <div class="md:col-start-7 md:col-span-5 col-span-12 flex flex-col text-lg px-10" >
                    <p class="mb-10">My training in cybersecurity allows me to secure the informatic environment of enterprises.</p>
                    <p class="mb-10">As a student, I am passionate about the cybersecurity world. I trained myself on platforms like TryHackMe or OZINT.</p> 
                    <p>End of my Master's degree : October 2027</p>
                    <a class="text-white flex flex-row rounded-2xl mt-5 w-48 p-4 bg-[#415446]" href="../document/CV.pdf" download><p>Download CV</p>  <img class="pl-3 pt-1 h-5" src="../img/download.png" alt="Amandine Vialle-Guérin"></a>
                    <div>

                        <a class=" place-content-end pt-16 xl:pt-48 text-lg flex flex-row" href="#skills">
                            <img class="w-8" src="../img/souris.png" alt="Amandine Vialle-Guérin">
                            <p class="pl-3 mt-1">Scroll Down</p>
                            <img class=" mt-2 ml-2 h-4" src="../img/fleche.png" alt="Amandine Vialle-Guérin">
                        </a>
                        
                    </div>
                    
                </div>
            </div>
        </div>

        <!-- SKILLS -->
        
        <section class="relative z-[1] py-28 mx-3 md:mx-24">
            <div class="w-[calc(100%_-_3rem)] mx-auto max-w-lg lg:max-w-5xl xl:max-w-7xl">
              <div class="mb-16">
                <h3 id="skills" class="scroll-mt-24 text-4xl font-bold capitalize text-center">Skills</h3>
              </div>
          
              <ul class="grid grid-cols-12 gap-y-12 lg:gap-12">
                <li class="col-span-12 lg:col-span-6">
                    <div class="flex gap-4 items-center">
                      <figure class="shrink-0 inline-flex items-center justify-center w-12 h-12">
                        <img src="../img/ordinateur.png" alt="Amandine Vialle-Guérin">
                      </figure>
                
                      <h4 class="text-2xl font-bold">Informatic Security</h4>
                    </div>
            
                    <div class="flex gap-4">
                      <div class="shrink-0" aria-hidden="true"></div>
            
                      <p class="text-gray-500 leading-normal pt-5">OS: Windows, Linux, VM/Hyper-V<br>Network: Apache, NGINX, OPNSense, Wireshark<br>Theory: OSI Model, ethics and responsibility</p>
                    </div>
                  </li>
                
                <li class="col-span-12 lg:col-span-6">
                  <div class="flex gap-4 items-center">
                    <figure class="shrink-0 inline-flex items-center justify-center w-12 h-12">
                        <img src="../img/programmation.png" alt="Amandine Vialle-Guérin">
                    </figure>
                    <h4 class="text-2xl font-bold">Programmation</h4>
                  </div>
                
                  <div class="mt-4 flex flex-col gap-2 px-3 pr-16">
                    <div class="flex flex-row">
                        <div class="shrink-0" aria-hidden="true">
                            <p>HTML/CSS</p> 
                        </div>
              
                        <div class="ml-5 mt-2 w-full h-2 bg-[#EBF0EC] rounded-full">
                            <div class="w-5/6 h-full text-center text-xs text-white bg-[#415446] rounded-full">
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-row">
                        <div class="shrink-0" aria-hidden="true">
                            <p>PHP/MySQL</p> 
                        </div>
              
                        <div class="ml-5 mt-2 w-full h-2 bg-[#EBF0EC] rounded-full">
                            <div class="w-4/6 h-full text-center text-xs text-white bg-[#415446] rounded-full">
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-row">
                        <div class="shrink-0" aria-hidden="true">
                            <p>Python</p> 
                        </div>
              
                        <div class="ml-5 mt-2 w-full h-2 bg-[#EBF0EC] rounded-full">
                            <div class="w-5/6 h-full text-center text-xs text-white bg-[#415446] rounded-full">
                            </div>
                        </div>
                    </div>
                  </div>
                </li>
          
                <li class="col-span-12 lg:col-span-6">
                  <div class="flex gap-4 items-center">
                    <figure class="shrink-0 inline-flex items-center justify-center w-12 h-12">
                        <img src="../img/langue.png" alt="Amandine Vialle-Guérin">
                    </figure>
                    <h4 class="text-2xl font-bold">Languages</h4>
                  </div>
                  
                    <div class="mt-4 flex flex-col gap-2 px-3 pr-16">
                        <div class="flex flex-row">
                            <div class="shrink-0" aria-hidden="true">
                                <p>French</p> 
                            </div>
                  
                            <div class="ml-5 mt-2 w-full h-2 bg-[#EBF0EC] rounded-full">
                                <div class="w-full h-full text-center text-xs text-white bg-[#415446] rounded-full">
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-row">
                            <div class="shrink-0" aria-hidden="true">
                                <p>English</p> 
                            </div>
                  
                            <div class="ml-5 mt-2 w-full h-2 bg-[#EBF0EC] rounded-full">
                                <div class="w-5/6 h-full text-center text-xs text-white bg-[#415446] rounded-full">
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-row">
                            <div class="shrink-0" aria-hidden="true">
                                <p>Corean</p> 
                            </div>
                  
                            <div class="ml-5 mt-2 w-full h-2 bg-[#EBF0EC] rounded-full">
                                <div class="w-1/5 h-full text-center text-xs text-white bg-[#415446] rounded-full">
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </li>
                <li class="col-span-12 lg:col-span-6">
                    <div class="flex gap-4 items-center">
                      <figure class="shrink-0 inline-flex items-center justify-center w-12 h-12">
                        <img src="../img/outils.png" alt="Amandine Vialle-Guérin">
                      </figure>
                
                      <h4 class="text-2xl font-bold">Tools</h4>
                    </div>
            
                    <div class="flex gap-4">
                      <div class="shrink-0" aria-hidden="true"></div>
            
                      <p class="text-gray-500 leading-normal pt-5">Team management with agile method, SCRUM, Notion, Gantt, Trello/kanban<br>Microsoft-office and Google</p>
                    </div>
                    
                  </li>
              </ul>
            </div>
          </section>
          <div>
            <a class=" place-content-end pt-16 text-lg flex flex-row mr-16" href="#qualifications">
                <img class="w-8" src="../img/souris.png" alt="Amandine Vialle-Guérin">
                <p class="pl-3 mt-1">Scroll Down</p>
                <img class=" mt-2 ml-2 h-4" src="../img/fleche.png" alt="Amandine Vialle-Guérin">
            </a>
            
        </div>

        <!-- MON PARCOURS -->

        
        <h3 id="qualifications" class="scroll-mt-24 mt-24 text-4xl font-bold capitalize text-center mb-16">Qualifications</h3>
        <div class="containe w-full">
            <div class="relative wrap overflow-hidden px-3 md:px-24 lg:px-52 xl:px-80 h-full">
              <div class="border-2-2 absolute border-opacity-20 border-gray-700 h-full border" style="left: 50%"></div>
              <!-- right timeline -->
              <div class=" flex justify-between items-center w-full right-timeline">
                <div class="order-1 w-5/12"></div>
                <div class="z-20 flex items-center order-1 bg-[#415446] shadow-xl w-5 h-5 rounded-full">
                </div>
                <div class="order-1  rounded-lg shadow-xl w-5/12 px-2 md:px-6 py-4">
                  <h4 class="mb-3 font-bold text-gray-800 text-xl">Bachelor of Science</h4>
                  <h5>Guardia Cybersecurity School - Lyon, FR</h5>
                  <div class="pt-5 flex flex-row">
                    <img class="h-5 mr-2" src="../img/calendrier.png" alt="Amandine Vialle-Guérin">
                    <h6 class="text-[#415446]">2022 - Present</h6>
                  </div>
                  
                </div>
              </div>
          
              <!-- left timeline -->
              <div class="mb-8 flex justify-between flex-row-reverse items-center w-full left-timeline">
                <div class="order-1 w-5/12"></div>
                <div class="z-20 flex items-center order-1 bg-[#415446] shadow-xl w-5 h-5 rounded-full">
                </div>
                <div class="order-1 rounded-lg shadow-xl w-5/12 px-2 md:px-6 py-4">
                  <h4 class=" font-bold text-xl">Baccalaureate speciality Maths - Physic - SI</h4>
                  <h5>Lycée du Grésivaudan de Meylan - Grenoble, FR</h5>
                  <div class="pt-5 flex flex-row">
                    <img class="h-5 mr-2" src="../img/calendrier.png" alt="Amandine Vialle-Guérin">
                    <h6 class="text-[#415446]">2022</h6>
                  </div>
                </div>
              </div>
              
              
          </div>
          <div>
            <a class=" place-content-end mr-16 text-lg flex flex-row" href="#projects">
                <img class="w-8" src="../img/souris.png" alt="Amandine Vialle-Guérin">
                <p class="pl-3 mt-1">Scroll Down</p>
                <img class=" mt-2 ml-2 h-4" src="../img/fleche.png" alt="Amandine Vialle-Guérin">
            </a>
            
            </div>

        <!-- GUARDIA'S PROJECT -->
        <h3 id="projects" class="mt-24 scroll-mt-24 text-4xl font-bold capitalize text-center mb-16" id="aboutMe">Projects</h3>

        <div id="divProject" class="width-full justify-center text-center flex mx-auto">


            <input type="radio" name="slider" class="d-none" id="s1" checked>
            <input type="radio" name="slider" class="d-none" id="s2">
            <input type="radio" name="slider" class="d-none" id="s3">
            <input type="radio" name="slider" class="d-none" id="s4">
            <input type="radio" name="slider" class="d-none" id="s5">
        
            <div class=" cards h-[500px] w-[350px] relative">
              <label class="rounded-3xl h-[450px] w-[350px] cursor-pointer absolute right-0 left-0 bg-white" for="s1" id="slide1">
                <div class="card">
                  <div class="image">
                    <img class="rounded-3xl mx-auto" src="../img/Web.jpg" alt="Amandine Vialle-Guérin">

                  </div>
                  <div class="infos">
                    <h5 class="mt-5 text-xl">Web</h5>
                    <p class="p-5">During this project we made our personal portfolio inline. We learned HTML/CSS and PHP/MySQL languages.</p>

                  </div>
                </div>
              </label>
        
              <label class="rounded-3xl h-[450px] w-[350px] cursor-pointer absolute right-0 left-0 bg-white" for="s2" id="slide2">
                <div class="card">
                  <div class="image">
                    <img class="rounded-3xl mx-auto" src="../img/network.jpg" alt="Amandine Vialle-Guérin">
                  </div>
                  <div class="infos">
                    <h5 class="mt-5 text-xl name">Network</h5>
                    <p class="p-5">We learned to make a secured network infrastructure.</p>
                  </div>
                </div>
              </label>
        
              <label class="rounded-3xl h-[450px] w-[350px] cursor-pointer absolute right-0 left-0 bg-white" for="s3" id="slide3">
                <div class="card">
                  <div class="image">
                    <img class="rounded-3xl mx-auto" src="../img/scrapping.jpg" alt="Amandine Vialle-Guérin">
                  </div>
                  <div class="infos">
                    <h5 class="mt-5 text-xl name">Scrapping</h5>
                    <p class="p-5">We scrap a website of our choice</p>
                  </div>
                </div>
              </label>
        
              <label class="rounded-3xl h-[450px] w-[350px] cursor-pointer absolute right-0 left-0 bg-white" for="s4" id="slide4">
                <div class="card">
                  <div class="image">
                    <img class="rounded-3xl mx-auto" src="../img/introCyber.jpg" alt="Amandine Vialle-Guérin">
                  </div>
                  <div class="infos">
                    <h5 class="mt-5 text-xl name">Intro to Cybersecurity</h5>
                    <p class="p-5">We learned the basics of cybersecurity</p>
                  </div>
                </div>
              </label>

              <label class="rounded-3xl h-[450px] w-[350px] cursor-pointer absolute right-0 left-0 bg-white" for="s5" id="slide5">
                <div class="card">
                  <div class="image">
                    <img class="rounded-3xl mx-auto" src="../img/CLanguage.jpg" alt="Amandine Vialle-Guérin">
                  </div>
                  <div class="infos">
                    <h5 class="mt-5 text-xl name">C Language</h5>
                    <p class="p-5">We made several games with the C language.</p>
                  </div>
                </div>
              </label>
            </div>
        
          </div>
          <div>
            <a class=" place-content-end mr-16 text-lg flex flex-row" href="#game">
                <img class="w-8" src="../img/souris.png" alt="Amandine Vialle-Guérin">
                <p class="pl-3 mt-1">Scroll Down</p>
                <img class=" mt-2 ml-2 h-4" src="../img/fleche.png" alt="Amandine Vialle-Guérin">
            </a>
            
            </div>
          
        <!-- GAME -->
        <h3 id="game" class="mt-24 scroll-mt-24 text-4xl font-bold capitalize text-center mb-16">Game</h3>
            <py-script src="../jeu/game.py"></py-script>
        <div>
            <a class=" place-content-end mr-16 text-lg flex flex-row" href="#contact">
                <img class="w-8" src="../img/souris.png" alt="Amandine Vialle-Guérin">
                <p class="pl-3 mt-1">Scroll Down</p>
                <img class=" mt-2 ml-2 h-4" src="../img/fleche.png" alt="Amandine Vialle-Guérin">
            </a>
            
            </div>
        <!-- GET IN TOUCH WITH ME -->
        <h3 id="contact" class="mt-24 scroll-mt-24 text-4xl font-bold capitalize text-center mb-16">Let a message</h3>

        <form class="mx-auto md:mx w-[250px] p-4 md:p-10 md:w-[500px] bg-white rounded-xl drop-shadow-lg space-y-4" action="../action/contact.php" method="post">

            <!-- Email -->
            <div class="flex flex-col">
                <label for="pseudo">Pseudo <span class="text-red-600">*</span></label>
                <input type="text" name="pseudo" id="pseudo"  class="bg-[#EBF0EC] border border-spacing-1 border-[#415446] rounded-xl mt-3 p-2 text-base" required>
            </div>
    
            <!-- Message -->
            <div class="flex flex-col">
                <label for="message">Message <span class="text-red-600">*</span></label>
                <textarea name="message" id="message" cols="30" rows="3" class="border border-spacing-1 border-[#415446] p-2 bg-[#EBF0EC] rounded-xl mt-3" required></textarea>
            </div>
            <button type="submit" class="rounded-xl px-5 py-1 bg-[#415446] text-white">Send</button>
        </form>
        
        <h3 class="mt-24 scroll-mt-24 text-4xl font-bold capitalize text-center mb-16">Feedback</h3>
        
        <!-- FOOTER -->
        
        <footer class="mt-24 bg-[#EBF0EC] text-[#415446] dark:bg-[#1f2022] relative z-[1] px-12 lg:pt-12">
            <div class="flex flex-col w-full md:flex-row ">
                
                <div class="md:w-[60%] flex flex-col my-8">
                    <p class="text-center font-medium text-[#415446] mx-auto mb-5 text-3xl">Amandine Vialle-Guérin</p>
                    <a href="#"><img class="h-20 mx-auto" src="../img//AVG-green.png" alt="Amandine Vialle-Guérin"></a>
                    
                </div>
                <ul class="md:w-[40%] text-[#415446] flex flex-col gap-5 font-medium text-center">
                    <li class="hover:text-black"><a href="#" >Home</a></li>
                    <li class="hover:text-black"><a href="#aboutMe" >About</a></li>
                    <li class="hover:text-black"><a href="#skills" >Skills</a></li>
                    <li class="hover:text-black"><a href="#projects" >Projects</a></li>
                    <li class="hover:text-black"><a href="#game" >Games</a></li>
                    <li class="hover:text-black"><a href="#contact" >Contact</a></li>
                </ul>
            </div>
            <div class="flex flex-col border-t border-gray-300 py-2 lg:py-3 mt-8 lg:mt-12 lg:flex-row lg:justify-between lg:items-center">
                
                
                
                <div class=" mb-3 lg:mb-0">
                <div class="text-center text-sm lg:text-xs flex flex-wrap gap-2 lg:gap-3">
                    <span>&copy; Amandine Vialle-Guérin. All Right Reserved.</span>
                </div>
                </div>
        
                <div class="mx-auto md:mx-0 flex items-center gap-2 lg:gap-3">
                  <a href="https://www.linkedin.com/in/avg38/" class="main-footer__social" target="_blank">
                      <img class="h-5" src="../img/linkedin.png" alt="">
                  </a>
                  <a href="https://github.com/Avg38" class="main-footer__social" target="_blank">
                      <img class="h-5" src="../img/github.png" alt="">
                  </a>
                
                </div>
            </div>
            
        </footer>

        <script src="../js/script.js"></script>
        <script src="../tailwind.config.js"></script>
        <script src="https://unpkg.com/typed.js@2.0.15/dist/typed.umd.js"></script>
        <script>
            const typed = new Typed('.type', {
                strings: ["a Cybersecurity Student","a Web Developper", "an Entrepreneur"],
                typeSpeed: 30,
                backSpeed: 30,
                loop: true
            });
        </script>
        <!-- <script src="../jeu/game.py"></script> -->
    </body>
</html>