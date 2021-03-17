<div class="modal fade" id="modal-id">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-dark" id="sampleCrudModal"> </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form id="notesdata" name="notesForm">
                    <div class="mb-3"><input type="hidden" name="notes_id" id="notes_id" value=""></div>

                    <div class="mb-3">
                        <label for="title" class="col-form-label text-dark">Title:</label>
                        <input type="text" class="form-control border-secondary" name="title" id="title" value="" required>
                        <p class="text-danger" id="form-validation"></p>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="col-form-label text-dark">Description:</label>
                        <textarea class="form-control border-secondary" name="description" id="description" cols="30" rows="4" required></textarea>
                        <p class="text-danger" id="form-validation2"></p>
                        <br>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary text-white" data-bs-dismiss="modal">Close</button>
                <button type="submit" value="Submit" id="submit" class="btn btn-primary">Create</button>
            </div>
        </div>
    </div>

</div>
