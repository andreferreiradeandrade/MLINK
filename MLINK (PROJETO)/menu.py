import tkinter as tk
from tkinter import *
import cadastrousu
# import os


class MeuMenu:
    def clientes(self):
        tela2 = tk.Tk()
        clientes = cadastrousu.LoginSystem(tela2)
        tela2.mainloop()

    def __init__(self, tela):
        self.tela = tela
        self.titulo = "Projeto teste - Menu"
        self.tela.title(self.titulo)
        self.tela.geometry("300x200")
        self.barraDeMenus=Menu(self.tela)
        self.menuCadastros=Menu(self.barraDeMenus, tearoff=0)
        self.menuCadastros.add_command(label="Clientes", command=self.clientes)
        self.menuCadastros.add_command(label="Publicacoes", command=self.clientes)
        self.menuCadastros.add_command(label="Comentarios", command=self.clientes)
        self.menuCadastros.add_separator()
        self.menuCadastros.add_command(label="Fechar", command=self.tela.quit)
        self.barraDeMenus.add_cascade(label="Cadastros", menu=self.menuCadastros)

        self.menuManutencao = Menu(self.barraDeMenus, tearoff=0)
        self.barraDeMenus.add_cascade(label="Manutenção", menu=self.menuManutencao)

        self.tela.config(menu=self.barraDeMenus)

if __name__ == "__main__":
    tela = tk.Tk()
    meumenu = MeuMenu(tela)
    tela.mainloop()