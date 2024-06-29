const modal = document.querySelector('.js-modal');
const modalButtons = document.querySelector('.js-modal-button');
const modalClose = document.querySelector('.js-close-button');

// modalButtons.forEach(button => {
//   button.addEventListener('click', function () {
//     const contactId = this.getAttribute('data-contact-id');
//     openModal(contactId);
//   });
// });

function openModal(contactId) {
  fetch(`/contacts/${contactId}`)
    .then(response => response.json())
    .then(data => {
      document.getElementById('contactDetails').innerHTML = `
                        <h2>Contact Details</h2>
                        <div>
                            <strong>ID:</strong> ${data.id}
                        </div>
                        <div>
                            <strong>Name:</strong> ${data.first_name} ${data.last_name}
                        </div>
                        <div>
                            <strong>Email:</strong> ${data.email}
                        </div>
                        <!-- 他の連絡先情報をここに追加 -->
                    `;
      modal.classList.add('is-open');
    })
    .catch(error => {
      console.error('Error fetching contact details:', error);
    });
}

// modalButton.addEventListener('click', function () {
//   modal.classList.add('is-open');
// });



modalClose.addEventListener('click', () => {
  modal.classList.remove('is-open');
});
