const ratingStars = [...document.getElementsByClassName("rating__star")];
const ratingResult = document.querySelector(".rating__result");function executeRating(stars, result) {
const starClassActive = "rating__star fas fa-star";
const starClassUnactive = "rating__star far fa-star";
const starsLength = stars.length;
let i;
stars.map((star) => {
star.onclick = () => {
i = stars.indexOf(star); if (star.className.indexOf(starClassUnactive) !== -1) {
for (i; i >= 0; --i) stars[i].className = starClassActive;
} else {
for (i; i < starsLength; ++i) stars[i].className = starClassUnactive;
}
};
});
}executeRating(ratingStars, ratingResult)

