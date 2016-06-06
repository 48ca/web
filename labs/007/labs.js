// https://fcps.tjhsst.edu/coursemgmt/media/300/resource/LAB PREREQs Class of 2017 v2.pdf

// As of 01/27/15
var classes = {
	"Foundations Computer Science": {
		name: "Foundations",
		term: "year",
		prereqs: []
	},
	"Accelerated Foundations Computer Science": {
		name: "Acc Foundations",
		term: "year",
		prereqs: []
	},
	"AP Computer Science": {
		term: "year",
		name: "APCS",
		prereqs: [
			[
				"Foundations Computer Science"
			],
			[
				"Accelerated Foundations Computer Science"
			]
		],
		skippable: "Can be skipped with test"
	},
	"Artificial Intelligence 1": {
		name: "AI1",
		term: "sem",
		prereqs: [[
			"AP Computer Science"
		]]
	},
	"Artificial Intelligence 2": {
		name: "AI2",
		term: "sem",
		prereqs: [[
			"AP Computer Science",
			"Artificial Intelligence 1"
		]]
	},
	"Parallel Computing 1": {
		name: "Parallel 1",
		term: "sem",
		prereqs: [[
			"AP Computer Science"
		]]
	},
	"Parallel Computing 2": {
		name: "Parallel 2",
		term: "sem",
		prereqs: [[
			"AP Computer Science",
			"Parallel Computing 1"
		]]
	}
};
var labs = {
	"Computer Systems": {
		name: "Computer Systems",
		apprequired: false,
		prereqs: [[
			"AP Computer Science"
		]],
		recommended: [
			["Artificial Intelligence 1", "Artificial Intelligence 2"],
			["Parallel Computing 1","Parallel Computing 2"]
		]
	}
};
