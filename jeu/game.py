import pyxel

class App:
    def __init__(self):
        pyxel.init(120, 120)
        pyxel.mouse(True)
        self.board = [[0,0,0],[0,0,0],[0,0,0]]
        self.player = 1
        self.game_over = False
        pyxel.run(self.update, self.draw)

    def update(self):
        if pyxel.btnp(0):
            x, y = pyxel.mouse_x // 40, pyxel.mouse_y // 40
            if self.board[x][y] == 0 and not self.game_over:
                self.board[x][y] = self.player
                self.check_win()
                self.player = 3 - self.player

    def draw(self):
        pyxel.cls(0)
        for i in range(1, 3):
            pyxel.line(0, i*40, 120, i*40, 7)
            pyxel.line(i*40, 0, i*40, 120, 7)
        for x in range(3):
            for y in range(3):
                if self.board[x][y] == 1:
                    pyxel.text(x*40+10, y*40+10, "X", 9)
                elif self.board[x][y] == 2:
                    pyxel.text(x*40+10, y*40+10, "O", 8)
        if self.game_over:
            pyxel.text(35, 55, "GAME OVER", pyxel.frame_count % 16)
        else:
            pyxel.text(20, 55, "Tic Tac Toe", 7)

    def check_win(self):
        for i in range(3):
            if self.board[i][0] == self.board[i][1] == self.board[i][2] != 0:
                self.game_over = True
            if self.board[0][i] == self.board[1][i] == self.board[2][i] != 0:
                self.game_over = True
        if self.board[0][0] == self.board[1][1] == self.board[2][2] != 0:
            self.game_over = True
        if self.board[2][0] == self.board[1][1] == self.board[0][2] != 0:
            self.game_over = True
        if all(self.board[i][j] != 0 for i in range(3) for j in range(3)):
            self.game_over = True

App()