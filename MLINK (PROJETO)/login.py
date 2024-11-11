import re
import sys
import tkinter as tk
from tkinter import messagebox
import sqlite3
import menu


class LoginSystem:
    def __init__(self, root):
        self.root = root
        self.root.title("Sistema de Login")
        self.root.geometry("300x300")
        self.conn = sqlite3.connect("usuarios.db")
        self.cursor = self.conn.cursor()
        self.nome_label = tk.Label(root, text="Nome: ")
        self.nome_label.pack()
        self.nome_entry = tk.Entry(root, width=30)
        self.nome_entry.pack()
        self.senha_label = tk.Label(root, text="Senha")
        self.senha_label.pack()
        self.senha_entry = tk.Entry(root, width=30, show="*")
        self.senha_entry.pack()
        self.login_button = tk.Button(root, text="Login", command=self.login)
        self.login_button.pack()
        self.cadastro_button = tk.Button(root, text="Cadastrar", command=self.cadastro)
        self.cadastro_button.pack()

    def login(self):
        nome = self.nome_entry.get()
        senha = self.senha_entry.get()
        
        if len(nome.strip()) == 0 or len(senha.strip()) == 0:
            messagebox.showinfo(title="Sistema de login", message="Campos obrigatórios não preenchidos")
        else:
            self.cursor.execute("SELECT * FROM usuarios WHERE nome= ? AND senha=?", (nome, senha))
            usuario = self.cursor.fetchone()
            if usuario:
                messagebox.showinfo(title="Sistema de login", message="Bem-vindo " + usuario[1])
                tela2 = tk.Tk()
                meu_menu = menu.MeuMenu(tela2) 
                tela2.mainloop()
            else:
                messagebox.showerror(title="Erro", message="Nome ou senha incorretos")

    def cadastro(self):
        pass


if __name__ == "__main__":
    root = tk.Tk()
    loginsystem = LoginSystem(root)
    root.mainloop()
