import pygame
import time
import random

pygame.init()

# Définition des couleurs
WHITE = (255, 255, 255)
BLACK = (0, 0, 0)
RED = (213, 50, 80)
GREEN = (0, 255, 0)
BLUE = (50, 153, 213)

# Définition de la taille de l'écran
SCREEN_WIDTH = 600
SCREEN_HEIGHT = 400

# Création de la fenêtre de jeu
screen = pygame.display.set_mode((SCREEN_WIDTH, SCREEN_HEIGHT))

# Initialisation de la variable "clock"
clock = pygame.time.Clock()

# Définition de la taille d'un bloc
BLOCK_SIZE = 10

# Initialisation de la police de caractères
font_style = pygame.font.SysFont(None, 50)

# Fonction pour dessiner le serpent
def draw_snake(snake_List):
    for x in snake_List:
        pygame.draw.rect(screen, GREEN, [x[0], x[1], BLOCK_SIZE, BLOCK_SIZE])

# Fonction pour afficher le message à l'écran
def message(msg, color):
    mesg = font_style.render(msg, True, color)
    screen.blit(mesg, [SCREEN_WIDTH / 6, SCREEN_HEIGHT / 3])

# Fonction principale du jeu
def gameLoop():
    game_over = False
    game_close = False

    # Initialisation de la position du serpent
    x1 = SCREEN_WIDTH / 2
    y1 = SCREEN_HEIGHT / 2

    # Initialisation des changements de position du serpent
    x1_change = 0
    y1_change = 0

    # Initialisation de la nourriture
    foodx = round(random.randrange(0, SCREEN_WIDTH - BLOCK_SIZE) / 10.0) * 10.0
    foody = round(random.randrange(0, SCREEN_HEIGHT - BLOCK_SIZE) / 10.0) * 10.0

    # Initialisation de la liste du serpent
    snake_List = []
    Length_of_snake = 1

    # Création de la fenêtre de jeu
    screen = pygame.display.set_mode((SCREEN_WIDTH, SCREEN_HEIGHT))
    pygame.display.set_caption('Snake Game')

    # Boucle principale du jeu
    while not game_over:

        # Si le jeu est terminé
        while game_close == True:
            screen.fill(BLUE)
            message("Vous avez perdu ! Appuyez sur Q pour quitter ou sur C pour rejouer", RED)
            pygame.display.update()

            # Gestion des événements Pygame
            for event in pygame.event.get():
                if event.type == pygame.KEYDOWN:
                    if event.key == pygame.K_q:
                        game_over = True
                        game_close = False
                    if event.key == pygame.K_c:
                        gameLoop()

            # Gestion des événements Pygame
            for event in pygame.event.get():
                if event.type == pygame.QUIT:
                    game_over = True
                if event.type == pygame.KEYDOWN:
                    if event.key == pygame.K_LEFT:
                        x1_change = -BLOCK_SIZE
                        y1_change = 0
                    elif event.key == pygame.K_RIGHT:
                        x1_change = BLOCK_SIZE
                        y1_change = 0
                    elif event.key == pygame.K_UP:
                        y1_change = -BLOCK_SIZE
                        x1_change = 0
                    elif event.key == pygame.K_DOWN:
                        y1_change = BLOCK_SIZE
                        x1_change = 0

                        # Si le serpent sort de l'écran
                        if x1 >= SCREEN_WIDTH or x1 < 0 or y1 >= SCREEN_HEIGHT or y1 < 0:
                            game_close = True
                
                        # Mise à jour de la position du serpent
                        x1 += x1_change
                        y1 += y1_change
                
                        # Affichage de la nourriture
                        screen.fill(BLACK)
                        pygame.draw.rect(screen, RED, [foodx, foody, BLOCK_SIZE, BLOCK_SIZE])
                
                        # Mise à jour de la liste du serpent
                        snake_Head = []
                        snake_Head.append(x1)
                        snake_Head.append(y1)
                        snake_List.append(snake_Head)
                        if len(snake_List) > Length_of_snake:
                            del snake_List[0]
                
                        # Si le serpent se mord la queue
                        for x in snake_List[:-1]:
                            if x == snake_Head:
                                game_close = True
                
                        # Affichage du serpent
                        draw_snake(snake_List)
                        pygame.display.update()
                
                        # Si le serpent mange la nourriture
                        if x1 == foodx and y1 == foody:
                            foodx = round(random.randrange(0, SCREEN_WIDTH - BLOCK_SIZE) / 10.0) * 10.0
                            foody = round(random.randrange(0, SCREEN_HEIGHT - BLOCK_SIZE) / 10.0) * 10.0
                            Length_of_snake += 1
                
                        # Mise à jour de la fenêtre
                        pygame.display.update()
                
                        # Effacement de l'écran
                        screen.fill(BLACK)
                
                        # Attente pour la prochaine frame
                        clock.tick(15)
                
                    # Fermeture de Pygame et de Python
                    pygame.quit()
                    quit()
                
                # Lancement du jeu
                gameLoop()
