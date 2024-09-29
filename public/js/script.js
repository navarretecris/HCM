document.getElementById("menu-toggle").addEventListener("click", function () {
    const sidebar = document.getElementById("sidebar");
    const mainContent = document.getElementById("main-content");

    // Toggle sidebar visibility
    sidebar.classList.toggle("hidden");

    // Adjust main content margin based on sidebar visibility
    if (sidebar.classList.contains("hidden")) {
        mainContent.classList.add("shifted");
    } else {
        mainContent.classList.remove("shifted");
    }
});

document.querySelectorAll(".sidebar-item").forEach((item) => {
    item.addEventListener("click", function () {
        // Close other submenus
        document.querySelectorAll(".sidebar-item").forEach((i) => {
            if (i !== this) {
                i.classList.remove("active");
            }
        });
        this.classList.toggle("active");
    });
});

document.getElementById("user-photo").addEventListener("click", function () {
    const dropdown = document.getElementById("dropdown");
    dropdown.classList.toggle("show");
});

// Close dropdown if clicked outside
document.addEventListener("click", function (event) {
    const userPhoto = document.getElementById("user-photo");
    const dropdown = document.getElementById("dropdown");

    if (!userPhoto.contains(event.target) && !dropdown.contains(event.target)) {
        dropdown.classList.remove("show");
    }
});

// Selecciona todos los elementos que disparan el modal
document.querySelectorAll(".submenu-item").forEach((item) => {
    if (item.textContent === "Create") {
        item.addEventListener("click", function () {
            document.getElementById("modal").style.display = "flex";
        });
    }
});

// Cierra el modal al hacer clic en el botón de cerrar
document
    .getElementById("close-btn-crear")
    .addEventListener("click", function () {
        document.getElementById("modal").style.display = "none";
    });

// Cierra el modal al hacer clic fuera del contenido del modal
window.addEventListener("click", function (event) {
    if (event.target.className === "modal-crear") {
        document.getElementById("modal").style.display = "none";
    }
});

const currentPath = window.location.pathname;

if (currentPath === "/users") {
    document.querySelectorAll(".edit-btn").forEach((button) => {
        button.addEventListener("click", function () {
            const card = this.closest(".user-card");
            const name = card.querySelector("h3").innerText.split(": ")[1];
            const document_type = card
                .querySelector("p:nth-child(2)")
                .innerText.split(": ")[1];
            const documento = card
                .querySelector("p:nth-child(3)")
                .innerText.split(": ")[1];
            const id_card = card
                .querySelector("p:nth-child(4)")
                .innerText.split(": ")[1];
            const role = card
                .querySelector("p:nth-child(5)")
                .innerText.split(": ")[1];
            const status = card
                .querySelector("p:nth-child(6)")
                .innerText.split(": ")[1];
            const email = card
                .querySelector("p:nth-child(7)")
                .innerText.split(": ")[1];
            const id = card
                .querySelector("p:nth-child(8)")
                .innerText.split(": ")[1];

            document.getElementById("edit_name").value = name;
            document.getElementById("edit_id").value = id;
            document.getElementById("edit_document_type").value = document_type;
            document.getElementById("edit_document").value = documento;
            document.getElementById("edit_id_card").value = id_card;
            document.getElementById("edit_role").value = role;
            document.getElementById("edit_status").value = status;
            document.getElementById("edit_email").value = email;

            const baseUrl = document
                .getElementById("editForm")
                .getAttribute("data-action-base");
            document.getElementById("editForm").action = `${baseUrl}/${id}`;
            document.getElementById("editModal").style.display = "flex";
        });
    });
}

if (currentPath === "/books") {
    document.querySelectorAll(".edit-btn").forEach((button) => {
        button.addEventListener("click", function () {
            const card = this.closest(".user-card");
            const title = card.querySelector("h3").innerText.split(": ")[1];
            const author = card
                .querySelector("p:nth-child(2)")
                .innerText.split(": ")[1];
            const isbn = card
                .querySelector("p:nth-child(3)")
                .innerText.split(": ")[1];
            const quantity = card
                .querySelector("p:nth-child(4)")
                .innerText.split(": ")[1];
            const price = card
                .querySelector("p:nth-child(5)")
                .innerText.split(": ")[1];
            const pages = card
                .querySelector("p:nth-child(6)")
                .innerText.split(": ")[1];
            const language = card
                .querySelector("p:nth-child(7)")
                .innerText.split(": ")[1];
            const status = card
                .querySelector("p:nth-child(8)")
                .innerText.split(": ")[1];
            const id = card
                .querySelector("p:nth-child(9)")
                .innerText.split(": ")[1];

            document.getElementById("edit_title").value = title;
            document.getElementById("edit_author").value = author;
            document.getElementById("edit_isbn").value = isbn;
            document.getElementById("edit_quantity").value = quantity;
            document.getElementById("edit_price").value = price;
            document.getElementById("edit_pages").value = pages;
            document.getElementById("edit_language").value = language;
            document.getElementById("edit_status").value = status;
            document.getElementById("edit_id").value = id;

            const baseUrl = document
                .getElementById("editForm")
                .getAttribute("data-action-base");
            document.getElementById("editForm").action = `${baseUrl}/${id}`;
            document.getElementById("editModal").style.display = "flex";
        });
    });
}

if (currentPath === "/loans") {
    document.querySelectorAll(".edit-btn").forEach((button) => {
        button.addEventListener("click", function () {
            const card = this.closest(".user-card");
            const userName = card.querySelector("h3").innerText.split(": ")[1];
            const bookTitle = card.querySelector("p:nth-child(2)").innerText.split(": ")[1];
            const bookAuthor = card.querySelector("p:nth-child(3)").innerText.split(": ")[1];
            const language = card.querySelector("p:nth-child(4)").innerText.split(": ")[1];
            const loanDate = card.querySelector("p:nth-child(5)").innerText.split(": ")[1];
            const endDate = card.querySelector("p:nth-child(6)").innerText.split(": ")[1];
            const returnDate = card.querySelector("p:nth-child(7)").innerText.split(": ")[1];
            const status = card.querySelector("p:nth-child(8)").innerText.split(": ")[1];
            const id = card.querySelector("p:nth-child(9)").innerText.split(": ")[1];

            
            document.getElementById("user_name").value = userName;
            document.getElementById("book_title").value = bookTitle;
            document.getElementById("book_author").value = bookAuthor;
            document.getElementById("language").value = language;
            document.getElementById("loan_date").value = loanDate;
            document.getElementById("end_date").value = endDate;
            document.getElementById("return_date").value = returnDate;
            document.getElementById("edit_status").value = status;
            document.getElementById("id").value = id;

            const baseUrl = document.getElementById("editForm").getAttribute("data-action-base");
            document.getElementById("editForm").action = `${baseUrl}/${id}`;
            document.getElementById("editModal").style.display = "flex";
        });
    });
}

document
    .querySelector(".close-btn-actualizar")
    .addEventListener("click", function () {
        document.getElementById("editModal").style.display = "none";
        console.log("click");
    });

document.querySelector(".cancel-btn").addEventListener("click", function () {
    document.getElementById("editModal").style.display = "none";
});

window.addEventListener("click", function (event) {
    const modal = document.getElementById("editModal");
    if (event.target == modal) {
        modal.style.display = "none";
    }
});
