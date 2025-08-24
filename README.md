# Leave Management System (LMS)

A web-based application designed to streamline the process of applying for and managing employee leaves within an academic institution. It provides distinct interfaces for different user roles such as Faculty, Head of Department (HOD), Dean, and Administrator, ensuring a clear and hierarchical approval process.

## ✨ Features
The system offers a role-based access control system with the following functionalities:
### 👤 Admin
-   **Dashboard:** View key statistics and system overview.
-   **Manage Departments:** Add, update, and delete academic departments.
-   **Manage Designations:** Create and manage employee roles (e.g., Professor, Assistant Professor).
-   **Manage Faculty:** Add, update, and delete faculty/employee records.
-   **Manage Leave Types:** Define different types of leave (e.g., Casual, Medical, Earned).
-   **System Users:** Manage login credentials for different roles.

### 🧑‍🏫 Faculty
-   **Dashboard:** View personal leave summary.
-   **Apply for Leave:** Fill out and submit leave application forms.
-   **Leave History:** Track the status (Pending, Approved, Rejected) of submitted applications.

### 👨‍💼 Head of Department (HOD)
-   **Dashboard:** Overview of departmental leave requests.
-   **Manage Leave:** Review leave applications from their respective department's faculty.
-   **Approve/Reject:** Action leave requests with a single click.

### 🏛️ Dean
-   **Dashboard:** High-level overview of leave applications across all departments.
-   **Manage Leave:** Review, approve, or reject leave applications forwarded for higher approval.
-   **View All Records:** Access a comprehensive history of all leave applications in the institution.

---

## 🛠️ Tech Stack

-   **Backend:** PHP
-   **Database:** MySQL
-   **Frontend:** HTML, CSS, JavaScript, jQuery
-   **UI Template:** [AdminLTE 3](https://adminlte.io/)
-   **Frameworks:** Bootstrap

---

## 🚀 Getting Started

Follow these instructions to set up the project on your local machine.

### Prerequisites

-   A local web server environment like [XAMPP](https://www.apachefriends.org/index.html) or WAMP.

### Installation

1.  **Clone the repository:**
    ```bash
    git clone <your-repository-url>
    ```
2.  **Move to your web server directory:**
    -   Place the cloned project folder inside the `htdocs` directory (for XAMPP) or `www` (for WAMP).

3.  **Database Setup:**
    -   Start the **Apache** and **MySQL** services from your XAMPP/WAMP control panel.
    -   Open your web browser and go to `http://localhost/phpmyadmin`.
    -   Create a new database. You can name it `lms_db` or any other name.
    -   Select the newly created database and click on the **Import** tab.
    -   Choose the `lms.sql` file from the project directory and click **Go** to import the schema and data.

4.  **Configure Database Connection:**
    -   Open the file `includes/config.php`.
    -   Update the database connection details with your credentials:
        ```php
        $db_host = 'localhost';
        $db_name = 'your_database_name'; // e.g., 'lms_db'
        $db_user = 'root';
        $db_pass = ''; // your database password, usually empty for default XAMPP
        ```

5.  **Create Initial Users (Optional):**
    -   The `admin` table holds user credentials for all roles.
    -   You can manually add users via `phpMyAdmin` or use the provided `create_user.php` script.
    -   To use the script, open it, modify the `$email`, `$password`, and `$designation` variables, and then run it by navigating to `http://localhost/your-project-folder/create_user.php` in your browser.

6.  **Run the Application:**
    -   Open your web browser and navigate to `http://localhost/your-project-folder/`.
    -   You should see the login page.


## 👥 Creators

-   Amit Kumar
-   Harekrishna
-   Nitish Kumar
-   Radhakrishna
