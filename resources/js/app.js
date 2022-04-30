require('./bootstrap');

import {Modal} from 'bootstrap'
import 'bootstrap/dist/css/bootstrap.css'

var deleteConfirmModal;

function showModal() {
    deleteConfirmModal = new Modal(document.getElementById("delete-confirm"));
    deleteConfirmModal.show();
}
window.showModal = showModal;

function confirmDelete() {
    document.getElementById("delete-form").submit();
    deleteConfirmModal.hide();
}
window.confirmDelete = confirmDelete;