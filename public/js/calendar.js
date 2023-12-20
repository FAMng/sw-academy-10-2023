const monthsFromNow = +window.location.search.split('monthsFromNow=')[1] || 0;

const goNext = () => {
    window.location.href = `/calendar?monthsFromNow=${monthsFromNow + 1}`;
}

const goPrev = () => {
    window.location.href = `/calendar?monthsFromNow=${monthsFromNow - 1}`;
}