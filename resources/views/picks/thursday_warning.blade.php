<div class="modal" id="thursdayPicksWarning">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h5 class="modal-title"><i class="fas fa-exclamation-triangle"></i> Warning</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="pb-2">
                    You have already picked all games for this week.
                </div>
                <div class="pb-2">
                    If you now submit picks for just the Thursday games, the picks you previously made for all other games will be erased and
                    you will need to pick them again before the deadline. If this is what you want to do then click the 'Continue' button below.
                </div>
                <div>
                    If you just want to change your Thursday picks without erasing all your other picks then click the 'Cancel' button below
                    and simply change the game(s) you want from the 'pick all games' screen.
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <a href="{{route('make_picks')}}?make=thursday" class="btn btn-primary">Continue</a>
            </div>
        </div>
    </div>
</div>