import tkinter as tk
from tkinter import ttk
from tkinter import messagebox
import sqlite3


class Lista:
    def __init__(self, tela,):
        self.tela = tela
        titulo = "Sistema de alunos = Pesquisa Alunos"
        self.titulo = titulo
        self.tela.title(titulo)
        self.tela.geometry("1000x400")
        self.conn = sqlite3.connect("usuarios.db")
        self.cursor = self.conn.cursor()
        self.cursor.execute("SELECT id, nome, email, telefone, senha FROM usuarios")
        tot_usuario = self.cursor.fetchall()
        self.conn.close()

        self.tree = ttk.Treeview(self.tela, columns=("ID", "Nome", "Email", "Telefone", "Senha"), show= "headings")
        self.tree.heading("ID", text = "ID")
        self.tree.heading("Nome", text = "Nome")
        self.tree.heading("Email", text= "Email")
        self.tree.heading("Telefone", text = "Telefone")
        self.tree.heading("Senha", text="Senha")

        for cont_usuario in tot_usuario:
            self.tree.insert("", tk.END, values=cont_usuario)

        self.tree.pack()

        self.exluir_botao = tk.Button(tela, text = "Excluir", command = self.excluir)
        self.exluir_botao.pack()

        self.alterar_botao = tk.Button(tela, text = "Alterar", command = self.alterar)
        self.alterar_botao.pack()

    def excluir(self):
        item_selecionado = self.tree.selection()[0]
        if len(item_selecionado.strip())<=0:
            self.tela.messagebox.showinfo(self.titulo, "Selecione uma linha")
        else:
           self.conn = sqlite3.connect("usuarios.db")
           self.cursor = self.conn.cursor()
           idusuario = self.tree.item(item_selecionado, "values")[0]
           self.cursor.execute("DELETE FROM usuarios WHERE id = ?", (idusuario,))
           self.conn.commit()
           self.conn.close()
           self.tree.delete(item_selecionado)
           messagebox.showinfo(self.titulo, "Excluido com sucesso")

    def alterar(self):
        item_seleconado = self.tree.selection()
        if len(item_seleconado) <= 0:
            messagebox.showinfo(self.titulo, 'Selecione uma linha')
        else:
            item_selecionado = self.tree.selection()[0]
            id_usuario = self.tree.item(item_selecionado, "values")[0]
            self.conn = sqlite3.connect("usuarios.db")
            self.cursor = self.conn.cursor()
            self.cursor.execute("SELECT nome, email, telefone, senha FROM usuarios WHERE id = ?", (id_usuario,))
            usuario = self.cursor.fetchone()
            self.conn.close()
            janela_nova = tk.Toplevel(self.tela)
            janela_nova.title(self.titulo + "alteracao")
            janela_nova.geometry("300x800")
            id_label = tk.Label(janela_nova, text = "codigo")
            id_label.pack()
            id_label2 = tk.Label(janela_nova, text = id_usuario)
            id_label2.pack()
            nome_label = tk.Label(janela_nova,text = "NOME")
            nome_label.pack()
            nome_entry = tk.Entry(janela_nova)
            nome_entry.insert(0, usuario[0])
            nome_entry.pack()
            email_label = tk.Label(janela_nova, text = "Email")
            email_label.pack()
            email_entry = tk.Entry(janela_nova)
            email_entry.insert(1, usuario[1])
            email_entry.pack()
            telefone_label = tk.Label(janela_nova, text = "Telefone")
            telefone_label.pack()
            telefone_entry = tk.Entry(janela_nova)
            telefone_entry.insert(2, usuario[2])
            telefone_entry.pack()
            senha_label = tk.Label(janela_nova, text = "Senha")
            senha_label.pack()
            senha_entry = tk.Entry(janela_nova)
            senha_entry.insert(3, usuario[3])
            senha_entry.pack()

            def botaogravar():
                novo_nome = nome_entry.get()
                novo_email = email_entry.get()
                nova_senha = senha_entry.get()
                novo_telefone = telefone_entry.get()
                self.conn = sqlite3.connect("usuarios.DB")
                self.cursor = self.conn.cursor()
                self.cursor.execute("UPDATE usuarios SET nome = ?, email = ?, telefone = ?, senha = ? WHERE ID = ?", (novo_nome, novo_email, novo_telefone, nova_senha, id_usuario))
                self.conn.commit()
                self.conn.close()
                self.tree.item(item_selecionado, values = (id_usuario, novo_nome, novo_email, novo_telefone, nova_senha))
            gravar_button = tk.Button(janela_nova, text = "gravar", command= lambda: [botaogravar()])
            gravar_button.pack()
            sair_button = tk.Button(janela_nova, text = "Sair", command = janela_nova.destroy)
            sair_button.pack()

if __name__== "__main__":
    tela = tk.Tk()
    lista = Lista(tela)
    tela.mainloop()