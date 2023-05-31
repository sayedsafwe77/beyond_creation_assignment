import "@ahmed-aliraqi/check-all";

CheckAll.onChange(function (el) {
    if (el.checked) {
        el.closest("tr").classList.add("tw-bg-gray-400");
    } else {
        el.closest("tr").classList.remove("tw-bg-gray-400");
    }
});
