#!/home/aluno/PycharmProjects/pythonProject/.venv/bin/python
# -*- coding: utf-8 -*-
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
        self.cursor.execute("""
            CREATE TABLE IF NOT EXISTS usuarios(
                id INTEGER PRIMARY KEY,
                nome TEXT,
                email TEXT,
                telefone TEXT,
                senha TEXT
            ) 
        """)

        self.nome_label = tk.Label(root, text="Nome: ")
        self.nome_label.pack()
        self.nome_entry = tk.Entry(root, width=30)
        self.nome_entry.pack()
        self.email_label = tk.Label(root, text="Email: ")
        self.email_label.pack()
        self.email_entry = tk.Entry(root, width=30)
        self.email_entry.pack()
        self.telefone_label = tk.Label(root, text = "Telefone")
        self.telefone_label.pack()
        self.telefone_entry = tk.Entry(root, width = 30)
        self.telefone_entry.pack()
        self.senha_label = tk.Label(root, text="Senha")
        self.senha_label.pack()
        self.senha_entry = tk.Entry(root, width=30, show="*")
        self.senha_entry.pack()
        self.cadastro_button = tk.Button(root, text="Cadastrar", command=self.cadastro)

        self.cadastro_button.pack()

    def cadastro(self):
        nome = self.nome_entry.get()
        email = self.email_entry.get()
        telefone = self.telefone_entry.get()
        senha = self.senha_entry.get()
        if len(email.strip()) <= 0 and len(senha.strip()) <= 0:
            messagebox.showinfo("Sistema de login", "Campos obrigatórios não preenchidos")
        else:
            self.cursor.execute("INSERT INTO usuarios (nome, email, telefone, senha) VALUES (?, ?, ?, ?)",
                                (nome, email, telefone, senha))
            self.conn.commit()
        
            if self.conn.commit:
                messagebox.showinfo(title = "Sistema de login", message = "Usuário cadastrado com sucesso")
            else:
                messagebox.showerror(title = "Sistema de login", message = "Não foi possível cadastrar")


if __name__ == "__main__":
    root = tk.Tk()
    loginsystem = LoginSystem(root)
    root.mainloop()
