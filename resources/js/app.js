require('./bootstrap');

const answersCheckboxs = document.querySelectorAll('[name*="question-"]');
const submitButton = document.querySelector('#submit-form')

if ( submitButton ) {
    for (const el of answersCheckboxs)
        el.addEventListener('change', e => validate());

    submitButton.setAttribute('disabled', 'true');

    const validate = () => {
        const questionsIds = new Set(([...answersCheckboxs].map(el => el.name.split('-')[1].split('[]')[0])));

        const checkedIds =  new Set (
            ([...answersCheckboxs])
                .map(el => el.checked ? el : null)
                .filter(Boolean)
        );

        if ( checkedIds.size === questionsIds.size ) 
            submitButton.removeAttribute('disabled');
        else 
            submitButton.setAttribute('disabled', 'true');
    }
}