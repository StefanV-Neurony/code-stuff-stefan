$(function(){


    $('#showMods').click(function(e){
        $('#modList').toggle();
        $('#suffixList').hide();
        $('#prefixList').hide();
        var button = $(this);
        button.text(button.text() == "Hide All Mods" ? "Show All Mods" : "Hide All Mods")
        var buttonsuffix = $('#showSuffixes');
        var buttonprefix = $('#showPrefixes');
        var buttoncorrupted = $('#showCorrupted');
        buttonprefix.text('Show All prefixes');
        buttonsuffix.text('Show All suffixes');
        buttoncorrupted.text('Show all corrupted');

    });
    $('#showSuffixes').click(function(){
        $('#suffixList').toggle();
        $('#modList').hide();
        $('#prefixList').hide();

        var button = $(this);
        button.text(button.text() == "Hide Suffixes" ? "Show Suffixes " : "Hide Suffixes")
        var buttonmods = $('#showMods');
        var buttonprefix = $('#showPrefixes');
        var buttoncorrupted = $('#showCorrupted');
        buttonprefix.text('Show all prefixes');
        buttonmods.text('Show All Mods');
        buttoncorrupted.text("Show all Corrupted");

    });
    $('#showPrefixes').click(function(){
        $('#prefixList').toggle();
        $('#modList').hide();
        $('#suffixList').hide();
        var button = $(this);
        button.text(button.text() == "Hide Prefixes" ? "Show Prefixes" : "Hide Prefixes")
        var buttonmods = $('#showMods');
        var buttonsuffix = $('#showSuffixes');
        var buttoncorrupted = $('#showCorrupted');
        buttonsuffix.text('Show all suffixes');
        buttonmods.text('Show All Mods');
        buttoncorrupted.text('Show All Corrupted');
    });
    $('#showCorrupted').click(function(){
        $('#corruptedListList').toggle();
        $('#modList').hide();
        $('#suffixList').hide();
        $('#prefixList').hide();
        var button = $(this);
        button.text(button.text() == "Hide Corrupted" ? "Show Corrupted" : "Hide Corrupted")
        var buttonmods = $('#showMods');
        var buttonsuffix = $('#showSuffixes');
        var buttonprefix= $('#showPrefixes');
        buttonsuffix.text('Show all suffixes');
        buttonmods.text('Show All Mods');
        buttonprefix.text('Show All Prefixes');
    });




 });
