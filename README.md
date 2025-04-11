
![logo](https://github.com/user-attachments/assets/8b228abb-5787-4825-86f6-ff0b0b612058)

# 📚 QBook – Ask, Answer, Learn!

Live Demo 🚀  
🌐 [http://qbook.great-site.net/](http://qbook.great-site.net/)

QBook is a simple and interactive question-and-answer platform built using **PHP**, **MySQL**, and **Bootstrap**. Inspired by platforms like Quora and Stack Overflow, QBook allows users to sign up, ask questions, and contribute answers, all within a clean and responsive UI.

---

## 🔍 Features

✅ User Authentication (Signup & Login)  
✅ Ask Questions with Categories  
✅ Answer Questions and View Replies  
✅ Search & Filter by Category, User, or Keywords  
✅ Delete Own Questions  
✅ Flash Messages for Actions (e.g. successful deletion)  
✅ Modular File Structure (DB, Routes, Views)  
✅ Fully Responsive with Bootstrap 5

---

## 📸 Screenshots
*Add your screenshots here using Markdown image links*

---

## ⚙️ Tech Stack

| Frontend        | Backend        | Styling         | Tools / Hosting        |
|----------------|----------------|------------------|--------------------------|
| HTML, CSS      | PHP (Vanilla)  | Bootstrap 5     | XAMPP / InfinityFree     |
| JavaScript     | MySQL          | Flash Messages  | GitHub, phpMyAdmin       |

---

## 🧠 How It Works

- Users can sign up and log in to their accounts.
- Once logged in, users can post questions under specific categories.
- Other users can respond with answers.
- Questions and answers are stored and retrieved from a MySQL database.
- Users can view related questions by category and perform keyword searches.

---

## 🛠️ Getting Started (Locally)

```bash
# Clone the repository
git clone https://github.com/Rohit7008/QBook.git
cd QBook

# Set up environment
Start Apache and MySQL in XAMPP

# Import the Database
Open phpMyAdmin and import `qbook.sql`

# Run the Application
Access at: http://localhost/QBook/client/index.php
```

---

## 📁 Folder Structure

```
QBook/
│
├── client/
│   ├── index.php
│   ├── feed.php
│   ├── question-details.php
│   ├── login.php
│   ├── signup.php
│   └── categorylist.php
│
├── server/
│   └── requests.php
│
├── common/
│   └── db.php
│
└── qbook.sql
```

---

## 🎯 Upcoming Features

🗂️ Admin Dashboard for managing users & categories  
📬 Email Notifications  
🔍 Advanced Search Filters  
📊 User Stats / Contributions  
🔐 Password Encryption and Recovery System

---

## 👨‍💻 Author

**Rohit Pottavathini**  
Developer | Designer | Builder  
📧 [rowork30@gmail.com](mailto:rowork30@gmail.com)  
GitHub · LinkedIn · Instagram

---

## 📃 License

This project is licensed under the MIT License.
