// Get all the certificate cards
const cards = document.querySelectorAll('.post');


// Loop through each card and add a hover effect
cards.forEach((post) => {
  post.addEventListener('mouseover', () => {
    post.style.transform = 'scale(1.1)';
    post.style.boxShadow = '0 8px 16px rgba(0, 0, 0, 0.3)';
  });

  post.addEventListener('mouseout', () => {
    post.style.transform = 'scale(1)';
    post.style.boxShadow = '0 4px 8px rgba(0, 0, 0, 0.2)';
  });


  // Add a click event listener to each card
  post.addEventListener('click', () => {
    const image = post.querySelector('img');
    openLightbox(image.src);
  });
});



// Function to open the lightbox with the clicked image
function openLightbox(imageUrl) {
  const lightbox = document.createElement('div');
  lightbox.classList.add('lightbox');

  const imageElement = document.createElement('img');
  imageElement.src = imageUrl;

  lightbox.appendChild(imageElement);
  document.body.appendChild(lightbox);

  // Add a click event listener to close the lightbox when clicked outside the image
  lightbox.addEventListener('click', () => {
    lightbox.remove();
  });
}

//Add a slideshow for the certificate images
let slideIndex = 0;
const slideshow = () => {
  const images = document.querySelectorAll('.post img');

  // Hide all images except the current slide
  for (let i = 0; i < images.length; i++) {
    images[i].style.display = 'none';
  }

  // Increment the slide index and reset it if it goes out of bounds
  slideIndex++;
  if (slideIndex > images.length) {
    slideIndex = 1;
  }


  // Display the current slide
  images[slideIndex - 1].style.display = 'block';
//
  // Call the function again after a certain delay
  setTimeout(slideshow, 1000);
};

// Call the slideshow function to start the slideshow
slideshow();



