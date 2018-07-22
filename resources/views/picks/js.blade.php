<script>
function HighlightPick(home_or_away, game_number)
{
    //if (deadline_passed)
    //    return true;

    (home_or_away == 'home') ? other_team = 'away' : other_team = 'home';

    $("#" + home_or_away + "_" + game_number).addClass("bg-success");
    $("#" + home_or_away + "_" + game_number).addClass("text-white");
    $("#" + other_team + "_" + game_number).removeClass("bg-success");
    $("#" + other_team + "_" + game_number).removeClass("text-white");

    // get html for best bet column
    //$.post('/services/html/best_bet.php', {team_id:team_id, team_abbrev:team_abbrev, game_number:game_number, bb_cannot_be_changed:bb_cannot_be_changed}, function(rHTML)
    //{
    //       $("#best_bet_" + game_number).html(rHTML);
    //        $("#best_bet_" + game_number).removeClass("bgcolor-green").addClass("bgcolor-blue");
    //    },
    //    'html');
    //
}
</script>