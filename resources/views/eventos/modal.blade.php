{{-- MODAL PARA INSERTAR --}}
<div class="modal fade" id="addeventmodal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Add Event</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">

                <div class="container-fluid">

                    <form autocomplete="off" method="POST" action="{{ route('evento.store') }}" id="createEvent" class="form-horizontal">
                    @csrf
                    <div class="row">

                        <div class="col-md-6">

                            <div id="title-group" class="form-group">
                                <label class="control-label" for="editEventTitle">Title</label>
                                
                                <select class="form-control addEventTitle buscar" id="addEventTitle" name="title">
                                    @foreach ($contactos as $contact)
                                        <option value="{{ $contact->id }}">{{ $contact->nombres }} {{ $contact->apellidos }}</option>
                                    @endforeach
                                </select>
                                <!-- errors will go here -->
                            </div>
                            <div id="allday-group" class="form-group">
                                <label class="control-label" for="allday">Allday</label>
                                <select class="form-control"  name="allday" id="allday">
                                    <option value="1">SI</option>
                                    <option selected value="0">NO</option>
                                </select>
                                
                                <!-- errors will go here -->
                            </div>

                            <div id="startdate-group" class="form-group">
                                <label class="control-label" for="startDate">Start Date</label>
                                <input type="datetime" class="form-control datetimepicker" id="startDate" name="startDate">
                                <!-- errors will go here -->
                            </div>

                            <div id="enddate-group" class="form-group">
                                <label class="control-label" for="endDate">End Date</label>
                                <input type="datetime" class="form-control datetimepicker" id="endDate" name="endDate">
                                <!-- errors will go here -->
                            </div>

                        </div>

                        <div class="col-md-6">

                            <div id="color-group" class="form-group">
                                <label class="control-label" for="color">Colour</label>
                                <input type="text" class="form-control colorpicker" name="color" value="#6453e9">
                                <!-- errors will go here -->
                            </div>

                            <div id="textcolor-group" class="form-group">
                                <label class="control-label" for="textcolor">Text Colour</label>
                                <input type="text" class="form-control colorpicker" name="text_color" value="#ffffff">
                                <!-- errors will go here -->
                            </div>
                            <button type="button" id="insertar" class="btn btn-primary">Save changes</button>

                        </div>

                    </div>

                    

                </div>

            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              
            </div>

            </form>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

{{-- MODAL PARA EDITAR --}}
<div class="modal fade" id="editeventmodal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Update Event</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">

                <div class="container-fluid">

                    <form method="POST" id="editEvent" class="form-horizontal">
                        @csrf
                       @method('PUT')

                    <input type="hidden" id="editEventId" name="editEventId" value="">

                    <div class="row">

                        <div class="col-md-6">

                            <div id="edit-title-group" class="form-group">
                                <label class="control-label" for="editEventTitle">Title</label>
                                
                                <select class="form-control editEventTitle " id="editEventTitle" name="title">
                                    @foreach ($contactos as $contact)
                                        <option value="{{ $contact->id }}">{{ $contact->nombres }} {{ $contact->apellidos }}</option>
                                    @endforeach
                                </select>
                                <!-- errors will go here -->
                            </div>
                            <div id="edit-allday-group" class="form-group">
                                <label class="control-label" for="editEventallday">Allday</label>
                                <select class="form-control" name="allday" id="allday">
                                    <option value="1">SI</option>
                                    <option selected value="0">NO</option>
                                </select>
                                <!-- errors will go here -->
                            </div>

                            <div id="edit-startdate-group" class="form-group">
                                <label class="control-label" for="editStartDate">Start Date</label>
                                <input type="datetime" class="form-control datetimepicker" id="editStartDate" name="start_event">
                                <!-- errors will go here -->
                            </div>

                            <div id="edit-enddate-group" class="form-group">
                                <label class="control-label" for="editEndDate">End Date</label>
                                <input type="datetime" class="form-control datetimepicker" id="editEndDate" name="end_event">
                                <!-- errors will go here -->
                            </div>

                        </div>

                        <div class="col-md-6">

                            <div id="edit-color-group" class="form-group">
                                <label class="control-label" for="editColor">Colour</label>
                                <input type="text" class="form-control colorpicker" id="editColor" name="color" value="#6453e9">
                                <!-- errors will go here -->
                            </div>

                            <div id="edit-textcolor-group" class="form-group">
                                <label class="control-label" for="editTextColor">Text Colour</label>
                                <input type="text" class="form-control colorpicker" id="editTextColor" name="text_color" value="#ffffff">
                                <!-- errors will go here -->
                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" id="editar" class="btn btn-primary">Save changes</button>
              <button type="button" class="btn btn-danger" id="deleteEvent" data-id>Delete</button>
            </div>

            </form>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
