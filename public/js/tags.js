var KTTagifyDemos = function () {
    // Private functions
    var demo1 = function () {
        var input = document.getElementById('kt_tagify_1');
        var tagify = new Tagify(input, {
            pattern: /^.{0,20}$/, // Validate typed tag(s) by Regex. Here maximum chars length is defined as "20"
            delimiters: ", ", // add new tags when a comma or a space character is entered
            maxTags: 6,
            blacklist: ["fuck", "shit", "pussy"],
            keepInvalidTags: true, // do not remove invalid tags (but keep them marked as invalid)
            whitelist: ["temple", "stun", "detective", "sign", "passion", "routine", "deck",
                "discriminate", "relaxation", "fraud", "attractive", "soft", "forecast",
                "point", "thank", "stage", "eliminate", "effective", "flood", "passive",
                "skilled", "separation", "contact", "compromise", "reality", "district",
                "nationalist", "leg", "porter", "conviction", "worker", "vegetable", "commerce",
                "conception", "particle", "honor", "stick", "tail", "pumpkin", "core", "mouse",
                "egg", "population", "unique", "behavior", "onion", "disaster", "cute", "pipe",
                "sock", "dialect", "horse", "swear", "owner", "cope", "global", "improvement",
                "artist", "shed", "constant", "bond", "brink", "shower", "spot", "inject",
                "bowel", "homosexual", "trust", "exclude", "tough", "sickness", "prevalence",
                "sister", "resolution", "cattle", "cultural", "innocent", "burial", "bundle",
                "thaw", "respectable", "thirsty", "exposure", "team", "creed", "facade",
                "calendar", "filter", "utter", "dominate", "predator", "discover", "theorist",
                "hospitality", "damage", "woman", "rub", "crop", "unpleasant", "halt", "inch",
                "birthday", "lack", "throne", "maximum", "pause", "digress", "fossil", "policy",
                "instrument", "trunk", "frame", "measure", "hall", "support", "convenience",
                "house", "partnership", "inspector", "looting", "ranch", "asset", "rally",
                "explicit", "leak", "monarch", "ethics", "applied", "aviation", "dentist",
                "great", "ethnic", "sodium", "truth", "constellation", "lease", "guide",
                "break", "conclusion", "button", "recording", "horizon", "council", "paradox",
                "bride", "weigh", "like", "noble", "transition", "accumulation", "arrow",
                "stitch", "academy", "glimpse", "case", "researcher", "constitutional",
                "notion", "bathroom", "revolutionary", "soldier", "vehicle", "betray", "gear",
                "pan", "quarter", "embarrassment", "golf", "shark", "constitution", "club",
                "college", "duty", "eaux", "know", "collection", "burst", "fun", "animal",
                "expectation", "persist", "insure", "tick", "account", "initiative", "tourist",
                "member", "example", "plant", "river", "ratio", "view", "coast", "latest",
                "invite", "help", "falsify", "allocation", "degree", "feel", "resort", "means",
                "excuse", "injury", "pupil", "shaft", "allow", "ton", "tube", "dress",
                "speaker", "double", "theater", "opposed", "holiday", "screw", "cutting",
                "picture", "laborer", "conservation", "kneel", "miracle", "primary",
                "nomination", "characteristic", "referral", "carbon", "valley", "hot", "climb",
                "wrestle", "motorist", "update", "loot", "mosquito", "delivery", "eagle",
                "guideline", "hurt", "feedback", "finish", "traffic", "competence", "serve",
                "archive", "feeling", "hope", "seal", "ear", "oven", "vote", "ballot", "study",
                "negative", "declaration", "particular", "pattern", "suburb", "intervention",
                "brake", "frequency", "drink", "affair", "contemporary", "prince", "dry",
                "mole", "lazy", "undermine", "radio", "legislation", "circumstance", "bear",
                "left", "pony", "industry", "mastermind", "criticism", "sheep", "failure",
                "chain", "depressed", "launch", "script", "green", "weave", "please",
                "surprise", "doctor", "revive", "banquet", "belong", "correction", "door",
                "image", "integrity", "intermediate", "sense", "formal", "cane", "gloom",
                "toast", "pension", "exception", "prey", "random", "nose", "predict", "needle",
                "satisfaction", "establish", "fit", "vigorous", "urgency", "X-ray", "equinox",
                "variety", "proclaim", "conceive", "bulb", "vegetarian", "available", "stake",
                "publicity", "strikebreaker", "portrait", "sink", "frog", "ruin", "studio",
                "match", "electron", "captain", "channel", "navy", "set", "recommend",
                "appoint", "liberal", "missile", "sample", "result", "poor", "efflux", "glance",
                "timetable", "advertise", "personality", "aunt", "dog"
            ],
            transformTag: transformTag,
            dropdown: {
                enabled: 3,
            }
        });

        function transformTag(tagData) {
            var states = [
                'success',
                'primary',
                'danger',
                'success',
                'warning',
                'dark',
                'primary',
                'info'
            ];

            tagData.class = 'tagify__tag tagify__tag--' + states[KTUtil.getRandomInt(0, 7)];

            if (tagData.value.toLowerCase() == 'shit') {
                tagData.value = 's✲✲t'
            }
        }

        tagify.on('add', function (e) {
            console.log(e.detail)
        });

        tagify.on('invalid', function (e) {
            console.log(e, e.detail);
        });
    }

    var demo2 = function () {
        var input = document.getElementById('kt_tagify_2');
        var tagify = new Tagify(input, {
            pattern: /^.{0,20}$/, // Validate typed tag(s) by Regex. Here maximum chars length is defined as "20"
            delimiters: ", ", // add new tags when a comma or a space character is entered
            maxTags: 6,
            blacklist: ["fuck", "shit", "pussy"],
            keepInvalidTags: true, // do not remove invalid tags (but keep them marked as invalid)
            whitelist: ["temple", "stun", "detective", "sign", "passion", "routine", "deck",
                "discriminate", "relaxation", "fraud", "attractive", "soft", "forecast",
                "point", "thank", "stage", "eliminate", "effective", "flood", "passive",
                "skilled", "separation", "contact", "compromise", "reality", "district",
                "nationalist", "leg", "porter", "conviction", "worker", "vegetable", "commerce",
                "conception", "particle", "honor", "stick", "tail", "pumpkin", "core", "mouse",
                "egg", "population", "unique", "behavior", "onion", "disaster", "cute", "pipe",
                "sock", "dialect", "horse", "swear", "owner", "cope", "global", "improvement",
                "artist", "shed", "constant", "bond", "brink", "shower", "spot", "inject",
                "bowel", "homosexual", "trust", "exclude", "tough", "sickness", "prevalence",
                "sister", "resolution", "cattle", "cultural", "innocent", "burial", "bundle",
                "thaw", "respectable", "thirsty", "exposure", "team", "creed", "facade",
                "calendar", "filter", "utter", "dominate", "predator", "discover", "theorist",
                "hospitality", "damage", "woman", "rub", "crop", "unpleasant", "halt", "inch",
                "birthday", "lack", "throne", "maximum", "pause", "digress", "fossil", "policy",
                "instrument", "trunk", "frame", "measure", "hall", "support", "convenience",
                "house", "partnership", "inspector", "looting", "ranch", "asset", "rally",
                "explicit", "leak", "monarch", "ethics", "applied", "aviation", "dentist",
                "great", "ethnic", "sodium", "truth", "constellation", "lease", "guide",
                "break", "conclusion", "button", "recording", "horizon", "council", "paradox",
                "bride", "weigh", "like", "noble", "transition", "accumulation", "arrow",
                "stitch", "academy", "glimpse", "case", "researcher", "constitutional",
                "notion", "bathroom", "revolutionary", "soldier", "vehicle", "betray", "gear",
                "pan", "quarter", "embarrassment", "golf", "shark", "constitution", "club",
                "college", "duty", "eaux", "know", "collection", "burst", "fun", "animal",
                "expectation", "persist", "insure", "tick", "account", "initiative", "tourist",
                "member", "example", "plant", "river", "ratio", "view", "coast", "latest",
                "invite", "help", "falsify", "allocation", "degree", "feel", "resort", "means",
                "excuse", "injury", "pupil", "shaft", "allow", "ton", "tube", "dress",
                "speaker", "double", "theater", "opposed", "holiday", "screw", "cutting",
                "picture", "laborer", "conservation", "kneel", "miracle", "primary",
                "nomination", "characteristic", "referral", "carbon", "valley", "hot", "climb",
                "wrestle", "motorist", "update", "loot", "mosquito", "delivery", "eagle",
                "guideline", "hurt", "feedback", "finish", "traffic", "competence", "serve",
                "archive", "feeling", "hope", "seal", "ear", "oven", "vote", "ballot", "study",
                "negative", "declaration", "particular", "pattern", "suburb", "intervention",
                "brake", "frequency", "drink", "affair", "contemporary", "prince", "dry",
                "mole", "lazy", "undermine", "radio", "legislation", "circumstance", "bear",
                "left", "pony", "industry", "mastermind", "criticism", "sheep", "failure",
                "chain", "depressed", "launch", "script", "green", "weave", "please",
                "surprise", "doctor", "revive", "banquet", "belong", "correction", "door",
                "image", "integrity", "intermediate", "sense", "formal", "cane", "gloom",
                "toast", "pension", "exception", "prey", "random", "nose", "predict", "needle",
                "satisfaction", "establish", "fit", "vigorous", "urgency", "X-ray", "equinox",
                "variety", "proclaim", "conceive", "bulb", "vegetarian", "available", "stake",
                "publicity", "strikebreaker", "portrait", "sink", "frog", "ruin", "studio",
                "match", "electron", "captain", "channel", "navy", "set", "recommend",
                "appoint", "liberal", "missile", "sample", "result", "poor", "efflux", "glance",
                "timetable", "advertise", "personality", "aunt", "dog"
            ],
            transformTag: transformTag,
            dropdown: {
                enabled: 3,
            }
        });

        function transformTag(tagData) {
            var states = [
                'success',
                'primary',
                'danger',
                'success',
                'warning',
                'dark',
                'primary',
                'info'
            ];

            tagData.class = 'tagify__tag tagify__tag--' + states[KTUtil.getRandomInt(0, 7)];

            if (tagData.value.toLowerCase() == 'shit') {
                tagData.value = 's✲✲t'
            }
        }

        tagify.on('add', function (e) {
            console.log(e.detail)
        });

        tagify.on('invalid', function (e) {
            console.log(e, e.detail);
        });
    }



    return {
        // public functions
        init: function () {
            demo1();
            demo2();
        }
    };
}();

jQuery(document).ready(function () {
    KTTagifyDemos.init();
});
