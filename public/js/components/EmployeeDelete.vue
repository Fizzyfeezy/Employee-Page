<template>
    <!-- Delete Modal HTML -->
    <div id="deleteModalSubscription" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action = "" class = "deleteForm">
          <div class="modal-header">            
            <h4 class="modal-title">Delete Employee</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          </div>
          <div class="modal-body">          
            <p>Are you sure you want to delete these Records?</p>
            <p class="text-warning"><small>This action cannot be undone.</small></p>
          </div>
          <div class="modal-footer">
            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
            <input type="submit" class="btn btn-danger" id = "deleteItems" value="Delete">
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
    export default {

        props : [
            'deleteEmployee',
        ],
        data() {
            return {
                user : ''
            }

        },

        methods : {
            deleteUser() {
                this.$emit('messagesent', {
                    user: this.user
                });
            },
        },
    };
</script>