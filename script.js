document.querySelector('.addBtn1').addEventListener('click', function(e) {
    e.preventDefault();
    addInput1();
});

document.querySelector('.addBtn2').addEventListener('click', function(e) {
    e.preventDefault();
    addInput2();
});

document.querySelector('.addBtn3').addEventListener('click', function(e) {
    e.preventDefault();
    addInput3();
});

document.querySelector('.addBtn4').addEventListener('click', function(e) {
    e.preventDefault();
    addInput4();
});

function addInput1() {
    const group = document.createElement('div');
    group.classList.add('flex');

    const organization = document.createElement('input');
    organization.type = 'text';
    organization.name = 'organization[]';
    organization.placeholder = 'Organización';
    organization.required = true;

    const job = document.createElement('input');
    job.type = 'text';
    job.name = 'job[]';
    job.placeholder = 'Puesto';
    job.required = true;

    const remove = document.createElement('span');
    remove.textContent = '×';
    remove.classList.add('delete');
    remove.addEventListener('click', function() {
        group.remove();
    });

    group.appendChild(organization);
    group.appendChild(job);
    group.appendChild(remove);

    document.querySelector('.inputGroup1').appendChild(group);
}

function addInput2() {
    const group = document.createElement('div');
    group.classList.add('flex');

    const institution = document.createElement('input');
    institution.type = 'text';
    institution.name = 'institution[]';
    institution.placeholder = 'Institución';
    institution.required = true;

    const career = document.createElement('input');
    career.type = 'text';
    career.name = 'career[]';
    career.placeholder = 'Carrera';
    career.required = true;

    const remove = document.createElement('span');
    remove.textContent = '×';
    remove.classList.add('delete');
    remove.addEventListener('click', function() {
        group.remove();
    });

    group.appendChild(institution);
    group.appendChild(career);
    group.appendChild(remove);

    document.querySelector('.inputGroup2').appendChild(group);
}

function addInput3() {
    const group = document.createElement('div');
    group.classList.add('flex');

    const language = document.createElement('input');
    language.type = 'text';
    language.name = 'language[]';
    language.placeholder = 'Idioma';
    language.required = true;

    const level = document.createElement('input');
    level.type = 'text';
    level.name = 'level[]';
    level.placeholder = 'Nivel';
    level.required = true;

    const remove = document.createElement('span');
    remove.textContent = '×';
    remove.classList.add('delete');
    remove.addEventListener('click', function() {
        group.remove();
    });

    group.appendChild(language);
    group.appendChild(level);
    group.appendChild(remove);

    document.querySelector('.inputGroup3').appendChild(group);
}

function addInput4() {
    const group = document.createElement('div');
    group.classList.add('flex');

    const skill = document.createElement('input');
    skill.type = 'text';
    skill.name = 'skill[]';
    skill.placeholder = 'Habilidad';
    skill.required = true;

    const remove = document.createElement('span');
    remove.textContent = '×';
    remove.classList.add('delete');
    remove.addEventListener('click', function() {
        group.remove();
    });

    group.appendChild(skill);
    group.appendChild(remove);

    document.querySelector('.inputGroup4').appendChild(group);
}