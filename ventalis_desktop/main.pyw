import tkinter as tk
from tkinter import *
from tkinter import ttk

if __name__ == '__main__':
    primary = '#095b65'
    secondary = '#CAAF94'
    thirdary = '#2C7152'
    ipadding = {'ipadx': 10, 'ipady': 10}
    win = tk.Tk()
    win.title("Ventalis - Votre espace employé")
    win.iconbitmap("img/ventalis.ico")
    win.geometry('1200x800')
    win.config(background=primary, pady=10, padx=10)

    username = tk.Label(win, text="Administrateur / Employé", background=primary, foreground='white', pady=10, padx=10)
    username.pack(**ipadding)
    clientLabel = tk.Label(win, text="Votre client", background=primary, foreground='white', anchor=W, pady=10, padx=10)
    clientLabel.pack()
    client = ttk.Combobox(win, values=["John Doe", "Jean Michel", "Marie Monique"])
    client.pack(**ipadding)

    frame = Frame(win, background=secondary, pady=10, padx=10)

    left_frame = Frame(frame, bg=secondary)
    commandLabel1 = tk.Label(left_frame,
                             text="Commande du 14/02/23 : Lorem ipsum dolor sit amet, consectetur adipiscing elit. ",
                             background='white', foreground='black')
    commandLabel1.pack()
    commandLabel2 = tk.Label(left_frame,
                             text="Commande du 16/02/23 : Lorem ipsum dolor sit amet, consectetur adipiscing elit. ",
                             background='white', foreground='black')
    commandLabel2.pack()
    commandLabel3 = tk.Label(left_frame,
                             text="Commande du 18/02/23 : Lorem ipsum dolor sit amet, consectetur adipiscing elit. ",
                             background='white', foreground='black')
    commandLabel3.pack()
    commandLabel4 = tk.Label(left_frame,
                             text="Commande du 20/02/23 : Lorem ipsum dolor sit amet, consectetur adipiscing elit. ",
                             background='white', foreground='black')
    commandLabel4.pack()
    left_frame.pack(expand=True, fill=tk.BOTH, side=tk.LEFT, padx=10)

    right_frame = Frame(frame, bg=secondary)
    message1Label = tk.Label(right_frame, text="Bonjour", background=primary, foreground='white')
    message1Label.pack(anchor=W, expand=True, padx=5, pady=5)
    message2Label = tk.Label(right_frame, text="Bonjour", background=thirdary, foreground='white')
    message2Label.pack(anchor=E, expand=True, padx=5, pady=5)
    message1Label = tk.Label(right_frame, text="Comment allez-vous ?", background=primary, foreground='white')
    message1Label.pack(anchor=W, expand=True, padx=5, pady=5)
    message2Label = tk.Label(right_frame, text="Très bien merci. Que puis-je faire pour vous aider ?",
                             background=thirdary, foreground='white')
    message2Label.pack(anchor=E, expand=True, padx=5, pady=5)
    send_button = Button(right_frame, text="Envoyer")
    send_button.pack(anchor=E)
    right_frame.pack(expand=True, fill=tk.BOTH, side=tk.RIGHT, padx=10)

    frame.pack(fill=tk.X, padx=20, pady=20)

    exit_button = Button(win, text="Exit", width=50, command=lambda: win.quit(), pady=10, padx=10)
    exit_button.pack()

    win.mainloop()
