// console.log('Hello world! This is the Information Management System.');
import { timeAgo, badge } from '../app.js';

const assets = await (await fetch('/api/assets/all')).json();
console.log(assets);

let current = [...assets],
    sortDirection = 1;
const rows = document.getElementById("rows"),
    cards = document.getElementById("cards"),
    count = document.getElementById("count");

// RENDER ASSETS
function render() {
    const q = document.getElementById("search").value.toLowerCase(),
        cat = document.getElementById("category").value,
        stat = document.getElementById("status").value;
    current = assets.filter(
        (a) =>
            (cat === "all" || a.category === cat) &&
            (stat === "all" ||
                a.status === stat ||
                (stat === "unassigned" && a.assigned_to === "unassigned")) &&
            Object.values(a).join(" ").toLowerCase().includes(q),
    );
    count.textContent = current.length;
    rows.innerHTML = current
        .map(
            (a, i) =>
                `<tr class="hover:bg-slate-50">
                    <td class="py-4">
                        <input class="item h-4 w-4 accent-signal" data-index="${i}" aria-label="Select ${a.asset_name}" type="checkbox">
                    </td>
                    <td class="py-4">
                        <b class="block">${a.asset_name}</b>
                        <span class="mono text-xs text-slate-400">${a.tag}</span>
                    </td>
                    <td class="py-4 text-slate-600">${a.category}</td>
                    <td class="py-4 ${a.assigned_to === "Unassigned" ? "text-amber-700" : "text-slate-600"}">${a.assigned_to ?? "No user"}</td>
                    <td class="py-4">
                        <span class="rounded-full px-2.5 py-1 text-xs font-bold ${badge(a.status)}">${a.status}</span>
                    </td>
                    <td class="py-4 text-right text-slate-500">${timeAgo(a.updated_at)}</td>
                    <td class="py-4 text-right">
                        <a href="/assets/asset/${a.id}" class="font-bold text-slate-400 hover:text-signal" aria-label="More actions for ${a.asset_name}" type="button">•••</a>
                    </td>
                </tr>`,
        )
        .join("");
    cards.innerHTML = current
        .map(
            (a) =>
                `<article class="rounded-xl border border-slate-100 shadow p-5">
                    <div class="flex justify-between gap-3">
                        <div>
                            <h3 class="font-extrabold">${a.asset_name}</h3>
                            <p class="mono mt-1 text-xs text-slate-400">${a.tag}</p>
                        </div>
                        <span class="rounded-full px-2.5 flex items-center py-0.5 text-xs font-bold ${badge(a.status)}">${a.status}</span>
                    </div>
                    <dl class="mt-5 grid grid-cols-2 gap-4 text-sm">
                        <div>
                            <dt class="text-xs font-bold uppercase tracking-wider text-slate-400">Category</dt>
                            <dd class="mt-1 font-semibold">${a.category}</dd>
                        </div>
                        <div><dt class="text-xs font-bold uppercase tracking-wider text-slate-400">assigned_to</dt>
                            <dd class="mt-1 font-semibold">${a.assigned_to ?? "No user"}</dd>
                        </div>
                    </dl>
                    <a href="/assets/asset/${a.id}" class="mt-5 text-sm font-bold text-signal" type="button">View asset →</a>
                </article>`,
        )
        .join("");
    bindChecks();
}

function bindChecks() {
    document
        .querySelectorAll(".item")
        .forEach((x) => x.addEventListener("change", updateBulk));
    updateBulk();
}

function updateBulk() {
    const n = document.querySelectorAll(".item:checked").length;
    document.getElementById("selected").textContent = n;
    document.getElementById("bulk").classList.toggle("hidden", !n);
}
["search", "category", "status"].forEach((id) =>
    document
        .getElementById(id)
        .addEventListener(id === "search" ? "input" : "change", render),
);
document.querySelectorAll(".quick").forEach((b) =>
    b.addEventListener("click", () => {
        document.getElementById("status").value = b.dataset.status;
        render();
    }),
);
document.getElementById("clear").addEventListener("click", () => {
    document.getElementById("search").value = "";
    document.getElementById("category").value = "all";
    document.getElementById("status").value = "all";
    render();
});
document.getElementById("selectAll").addEventListener("change", (e) => {
    document
        .querySelectorAll(".item")
        .forEach((x) => (x.checked = e.target.checked));
    updateBulk();
});
document.querySelectorAll(".sort").forEach((b) =>
    b.addEventListener("click", () => {
        const key = b.dataset.key;
        assets.sort((a, c) => a[key].localeCompare(c[key]) * sortDirection);
        sortDirection *= -1;
        render();
    }),
);
document.getElementById("tableView").addEventListener("click", () => {
    document.getElementById("tableWrap").classList.remove("hidden");
    cards.classList.add("hidden");
});
document.getElementById("cardView").addEventListener("click", () => {
    document.getElementById("tableWrap").classList.add("hidden");
    cards.classList.remove("hidden");
});
render();
