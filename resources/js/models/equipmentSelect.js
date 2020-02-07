import * as helper from '../helpers/mainHelper';
import APISelect from "./apiSelect";

class EquipmentSelect {
    constructor(parentId, link) {
        this.setVars(parentId, link);
        this.initSelect();
    }

    setVars(parentId, link) {
        this.name = "equipment";
        this.container = document.getElementById(parentId);
        this.link = link;
        this.equipment = {};
    }

    setEquipment(entries) {
        for (let k in entries)
            this.addEntryField(k, entries[k]);
    }

    initSelect() {
        let selectContainer = document.createElement('div');
        helper.setAttributes(selectContainer, {'class': 'form-group row d-flex align-items-end'});

        let div = document.createElement('div');
        helper.setAttributes(div, {'class': 'col-lg-8'});
        selectContainer.appendChild(div);

        let label = document.createElement('label');
        helper.setAttributes(label, {
            'for': `${this.name}Select`,
            'class': 'col-form-label'
        });
        label.innerHTML = `Choose equipment to add`;
        div.appendChild(label);

        this.select = document.createElement('select');
        helper.setAttributes(this.select, {
            'class': 'form-control',
            'id': `${this.name}Select`,
        });
        div.appendChild(this.select);

        div = document.createElement('div');
        helper.setAttributes(div, {'class': 'col-lg-4'});
        selectContainer.appendChild(div);

        let addingBtn = document.createElement('button');
        helper.setAttributes(addingBtn, {
            'class': 'btn btn-block btn-rounded btn-success addingBtn',
            'id': `adding${this.name.capitalize()}Btn`,
            'type': 'button'
        });
        addingBtn.innerHTML = 'Add Equipment';
        addingBtn.addEventListener('click', this);
        div.appendChild(addingBtn);

        this.container.appendChild(selectContainer);

        new APISelect(`#${this.name}Select`, this.link);
    }

    handleEvent(event) {
        this['on' + event.type](event);
    }

    onclick(event) {
        let target = event.target;
        if (helper.classIncludes(target, 'addingBtn'))
            this.addEntries(target);

        if (helper.classIncludes(target, 'deletingBtn'))
            this.removeEntryField(target);
    }

    addEntries(button) {
        let option = this.select.options[this.select.selectedIndex];

        if (this.isEntryNotCreated(option))
            this.addEntryField(option.value, option.innerHTML);
    }

    addEntryField(optionId, optionName, quantity) {
        let div = document.createElement('div');
        helper.setAttributes(div, {'class': 'md-form d-flex',});

        let inputContainer = document.createElement('div');
        helper.setAttributes(inputContainer, {'class': 'flex-grow-1',});
        div.appendChild(inputContainer);

        let input = document.createElement("input");
        helper.setAttributes(input, {
            'class': 'form-control',
            'type': 'number',
            'name': `${this.name+"["+optionId+"][quantity]"}`,
            'id': `${this.name+optionId}`,
            'value': quantity,
            'required': ''
        });
        this.equipment[optionId] = input;
        inputContainer.appendChild(input);

        let inputQuantity = document.createElement("input");
        helper.setAttributes(inputQuantity, {
            'hidden': '',
            'type': 'number',
            'name': `${this.name+"["+optionId+"][stall_equipment_id]"}`,
            'value': optionId,
            'required': ''
        });
        inputContainer.appendChild(inputQuantity);

        let label = document.createElement('label');
        helper.setAttributes(label, {
            'for': `${this.name+optionId}`,
        });
        label.innerHTML = `${optionName} quantity`;
        inputContainer.appendChild(label);

        let deleteBtn = document.createElement('button');
        helper.setAttributes(deleteBtn, {
            'class': 'btn btn-danger ml-2 mt-auto deletingBtn',
            'id': `${this.name+optionId}DeletingBtn`,
            'type': 'button'
        });
        deleteBtn.innerHTML = "&times;";
        deleteBtn.addEventListener('click', this);
        div.appendChild(deleteBtn);

        this.container.appendChild(div);
        this.container.insertBefore(div, this.select.parentNode.parentNode);
    }

    removeEntryField(entry) {
        let id = entry.id.replace(this.name,'');
        id = id.replace("DeletingBtn",'');
        delete this.equipment[id];

        let group = entry.parentNode;
        group.parentNode.removeChild(group);
    }

    isEntryNotCreated(option) {
        if (option === undefined)
            return false;

        return this.equipment[option.value] === undefined;
    }
}

export default EquipmentSelect;
window.EquipmentSelect = EquipmentSelect;
