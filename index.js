let transactions = [];
function addTransaction(){
    const type = document.getElementById("type").ariaValueMax;
    const amount = parsefloat(document.getElementById("amount").value);
    if (isNaN(amount) || amount <= 0) {
        alert("masukkan jumlah yang valid");
        return;
    }
    const transaction ={ type, amount};
    transaction.push(transaction);
    displayTrasactions();
}
function updateSummary(){
    let income = 0, expense = 0;
    transaction.forEach(trans => {
        if (trans.type ==="income") income += trans.amount;
        else if (trans.type === "expense") expense += trans.amount;

    });
    document.getElementById("total-income").textcontent = income;
    document.getElementById("total-expense").textcontent = expense;
    document.getElementById("balance").textcontent = income - expense;
}
function displayTrasnsactions() {
    const list = document.getElementById("transaction-list");
    list.innerHTML = "";

    transactions.forEach((trans, index) => {
        const listItem = document.createElement("li");
        // Menggunakan backtick untuk template string
        listItem.textContent = `${trans.type === "income" ? "Pendapatan" : "Pengeluaran"}: ${trans.amount.toFixed(2)}`;
        list.appendChild(listItem);
    });
}

function clearInputFields() {
    document.getElementById("type").value = "income";
    document.getElementById("amount").value = "";
}
