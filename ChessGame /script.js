// عناصر الواجهة والمتغيرات الرئيسية
const start_btn = document.querySelector("#newgameb");
const main_screen = document.querySelector(".screen");
const main_start = document.querySelector(".newgame");
const count_id = document.querySelector("#counter");
let shot = document.querySelector(".shot"),
  hit = document.querySelector(".hit"),
  count = document.querySelector(".count strong"),
  counter = 0,
  timer = 1000;
let mrmr = document.querySelectorAll("body");

// دالة لإضافة صف إلى جدول الصدارة
const appendTableRow = (item) => {
  const row = document.createElement("tr");
  const name = document.createElement("td");
  name.innerText = item.name;
  const value = document.createElement("td");
  value.innerText = item.balance;
  row.appendChild(name);
  row.appendChild(value);
  tableBody.appendChild(row);
};

// تهيئة وعرض جدول الصدارة
const initLeaderboard = (user = null) => {
  const LEADERS = [];

  let leaderboardData = JSON.parse(localStorage.getItem("leaderboard"));
  if (!leaderboardData) {
    leaderboardData = LEADERS;
  }

  if (!!user) {
    leaderboardData = leaderboardData.filter((item) => item.name !== user.name);
    leaderboardData = [...leaderboardData, user];
  }
  leaderboardData = leaderboardData.sort((a, b) => b.balance - a.balance);
  leaderboardData = leaderboardData.slice(0, 10);

  // مسح الجدول الحالي
  if (tableBody.rows) {
    const len = tableBody.rows.length;
    for (var i = 0; i < len; i++) {
      tableBody.deleteRow(0);
    }
  }
  leaderboardData.forEach((item) => appendTableRow(item));
  localStorage.setItem("leaderboard", JSON.stringify(leaderboardData));
};

// تهيئة جدول الصدارة عند تحميل الصفحة
initLeaderboard();

// دالة مقابلة الزر البدء
start_btn.addEventListener("click", (event) => {
  event.preventDefault();
  main_start.style.visibility = "hidden";
  main_screen.style.visibility = "visible";
  document.body.addEventListener("click", playShot);
  refresh_interval = setInterval(replay, timer);
});

// دالة بدء اللعبة من جديد
function start_2() {
  refresh_cow();
  model_close();
  document.body.addEventListener("click", playShot);
  clearInterval(refresh_interval);
  counter = 0;
  count.textContent = 0;
  timer = 1000;
  refresh_interval = setInterval(replay, timer);
}

// دالة تحديث حالة الزجاجات
function refresh_cow() {
  let cows = document.querySelectorAll(".beer");
  for (let i = 0; i < cows.length; i = i + 2) {
    cows[i].classList.add("die");
  }
}

// دالة تشغيل الصوت عند إصابة الزجاجة
function playShot(e) {
  let el = e.target;
  if (el.classList.contains("beer")) {
    counter++;
    count.textContent = counter;
    el.classList.add("die");
    if (timer > 140) {
      timer = timer - 100;
    }
  }
}

// دالة إعادة تشغيل اللعبة
function replay(e) {
  let died = document.querySelectorAll(".die ");
  if (died.length == 0) {
    model_open();
    clearInterval(refresh_interval);
  } else {
    let rand_el = getRandomArrayElement(died);
    rand_el.classList.remove("die");
  }
  count.textContent = counter;
}

// دالة الحصول على عنصر عشوائي من مصفوفة
function getRandomArrayElement(arr) {
  return arr[Math.floor(Math.random() * arr.length)];
}

// دالة فتح نافذة المربع التوجيهي
function model_open() {
   let name = document.querySelector("#nameinput");
   name = name.value;
   count_id.innerHTML = counter;

  let modelwrapper = document.querySelector(".modal-wrapper");
  modelwrapper.classList.add("active");
}

// دالة إغلاق نافذة المربع التوجيهي
function model_close() {
  counter = 0;
  let modelwrapper = document.querySelector(".modal-wrapper");
  modelwrapper.classList.remove("active");
}

// دالة حفظ اسم اللاعب ونتيجته
function savename() {
  let name = document.querySelector("#nameinput");
  name = name.value;
  count_id.innerHTML = counter;
  initLeaderboard({ name: name, balance: counter });
  console.log(123);
  start_2();
}
