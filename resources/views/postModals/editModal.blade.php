<div class="modal fade" id="modal-id">
    <div class="modal-dialog">
        <div class="modal-content">
            
            <div class="modal-header">
                <h4 class="modal-title" id="userCrudModal"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>

            <div class="modal-body">
                <form id="postdata">

                    <input type="hidden" id="post_id" name="post_id" value="">
                    <input type="text" id="post-title" name="post-title" value="" placeholder="Title" class="form-control">
                    <textarea type="text" id="post-text" name="post-text" value="" placeholder="Description" class="form-control"></textarea>
                    </label><br>

                    <input type="submit" value="Submit" id="submit" class="btn btn-sm btn-outline-danger py-0" style="font-size: 0.8em;">
                </form>
                
            </div>
        </div>
    </div>
</div> 