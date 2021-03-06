var Dashboard = function() {

	return {
		initCalendar : function() {
			if (!jQuery().fullCalendar) {
				return;
			}

			var date = new Date();
			var d = date.getDate();
			var m = date.getMonth();
			var y = date.getFullYear();

			var h = {};

			if ($('#calendar').width() <= 400) {
				$('#calendar').addClass("mobile");
				h = {
					left : 'title, prev, next',
					center : '',
					right : 'today,month,agendaWeek,agendaDay'
				};
			} else {
				$('#calendar').removeClass("mobile");
				if (App.isRTL()) {
					h = {
						right : 'title',
						center : '',
						left : 'prev,next,today,month,agendaWeek,agendaDay'
					};
				} else {
					h = {
						left : 'title',
						center : '',
						right : 'prev,next,today,month,agendaWeek,agendaDay'
					};
				}
			}

			$('#calendar').fullCalendar('destroy');
			// destroy the calendar
			$('#calendar').fullCalendar({//re-initialize the calendar
				disableDragging : false,
				header : h,
				editable : true,
				events : [{
					title : 'All Day Event',
					start : new Date(y, m, 1),
					backgroundColor : App.getLayoutColorCode('yellow')
				}, {
					title : 'Long Event',
					start : new Date(y, m, d - 5),
					end : new Date(y, m, d - 2),
					backgroundColor : App.getLayoutColorCode('green')
				}, {
					title : 'Repeating Event',
					start : new Date(y, m, d - 3, 16, 0),
					allDay : false,
					backgroundColor : App.getLayoutColorCode('red')
				}, {
					title : 'Repeating Event',
					start : new Date(y, m, d + 4, 16, 0),
					allDay : false,
					backgroundColor : App.getLayoutColorCode('green')
				}, {
					title : 'Meeting',
					start : new Date(y, m, d, 10, 30),
					allDay : false,
				}, {
					title : 'Lunch',
					start : new Date(y, m, d, 12, 0),
					end : new Date(y, m, d, 14, 0),
					backgroundColor : App.getLayoutColorCode('grey'),
					allDay : false,
				}, {
					title : 'Birthday Party',
					start : new Date(y, m, d + 1, 19, 0),
					end : new Date(y, m, d + 1, 22, 30),
					backgroundColor : App.getLayoutColorCode('purple'),
					allDay : false,
				}, {
					title : 'Click for Google',
					start : new Date(y, m, 28),
					end : new Date(y, m, 29),
					backgroundColor : App.getLayoutColorCode('yellow'),
					url : 'http://google.com/',
				}]
			});
		},

		initCharts : function() {
			if (!jQuery.plot) {
				return;
			}

			var data = [];
			var totalPoints = 250;

			function showTooltip(title, x, y, contents) {
				$('<div id="tooltip" class="chart-tooltip"><div class="date">' + title + '<\/div><div class="label label-success">CTR: ' + x / 10 + '%<\/div><div class="label label-important">Imp: ' + x * 12 + '<\/div><\/div>').css({
					position : 'absolute',
					display : 'none',
					top : y - 100,
					width : 75,
					left : x - 40,
					border : '0px solid #ccc',
					padding : '2px 6px',
					'background-color' : '#fff',
				}).appendTo("body").fadeIn(200);
			}

			function randValue() {
				return (Math.floor(Math.random() * (1 + 50 - 20))) + 10;
			}
			
			var pageviews = [
					<?php
					foreach ($chart1 as $key) {
						echo "[" . $key -> day . "," . $key -> count . "],";
					}
					?>
			];

			var visitors = [
			/*[1, randValue() - 5],
			 [2, randValue() - 5],*/

			];

			if ($('#site_statistics').size() != 0) {

				$('#site_statistics_loading').hide();
				$('#site_statistics_content').show();
				alert();
				var plot_statistics = $.plot($("#site_statistics"), [{
					data : pageviews,
					label : "Unique Visits"
				}, {
					data : visitors,
					label : "Page Views"
				}], {
					series : {
						lines : {
							show : true,
							lineWidth : 2,
							fill : true,
							fillColor : {
								colors : [{
									opacity : 0.05
								}, {
									opacity : 0.01
								}]
							}
						},
						points : {
							show : true
						},
						shadowSize : 2
					},
					grid : {
						hoverable : true,
						clickable : true,
						tickColor : "#eee",
						borderWidth : 0
					},
					colors : ["#d12610", "#37b7f3", "#52e136"],
					xaxis : {
						ticks : 11,
						tickDecimals : 0
					},
					yaxis : {
						ticks : 11,
						tickDecimals : 0
					}
				});

				var previousPoint = null;
				$("#site_statistics").bind("plothover", function(event, pos, item) {
					$("#x").text(pos.x.toFixed(2));
					$("#y").text(pos.y.toFixed(2));
					if (item) {
						if (previousPoint != item.dataIndex) {
							previousPoint = item.dataIndex;

							$("#tooltip").remove();
							var x = item.datapoint[0].toFixed(2), y = item.datapoint[1].toFixed(2);

							showTooltip('24 Jan 2013', item.pageX, item.pageY, item.series.label + " of " + x + " = " + y);
						}
					} else {
						$("#tooltip").remove();
						previousPoint = null;
					}
				});
			}

			if ($('#load_statistics').size() != 0) {
				//server load
				$('#load_statistics_loading').hide();
				$('#load_statistics_content').show();

				var updateInterval = 30;
				var plot_statistics = $.plot($("#load_statistics"), [getRandomData()], {
					series : {
						shadowSize : 1
					},
					lines : {
						show : true,
						lineWidth : 0.2,
						fill : true,
						fillColor : {
							colors : [{
								opacity : 0.1
							}, {
								opacity : 1
							}]
						}
					},
					yaxis : {
						min : 0,
						max : 100,
						tickFormatter : function(v) {
							return v + "%";
						}
					},
					xaxis : {
						show : false
					},
					colors : ["#e14e3d"],
					grid : {
						tickColor : "#a8a3a3",
						borderWidth : 0
					}
				});

				function statisticsUpdate() {
					plot_statistics.setData([getRandomData()]);
					plot_statistics.draw();
					setTimeout(statisticsUpdate, updateInterval);

				}

				statisticsUpdate();

				$('#load_statistics').bind("mouseleave", function() {
					$("#tooltip").remove();
				});
			}

			if ($('#site_activities').size() != 0) {
				//site activities
				var previousPoint2 = null;
				$('#site_activities_loading').hide();
				$('#site_activities_content').show();

				var activities = [[1, 10], [2, 9], [3, 8], [4, 6], [5, 5], [6, 3], [7, 9], [8, 10], [9, 12], [10, 14], [11, 15], [12, 13], [13, 11], [14, 10], [15, 9], [16, 8], [17, 12], [18, 14], [19, 16], [20, 19], [21, 20], [22, 20], [23, 19], [24, 17], [25, 15], [25, 14], [26, 12], [27, 10], [28, 8], [29, 10], [30, 12], [31, 10], [32, 9], [33, 8], [34, 6], [35, 5], [36, 3], [37, 9], [38, 10], [39, 12], [40, 14], [41, 15], [42, 13], [43, 11], [44, 10], [45, 9], [46, 8], [47, 12], [48, 14], [49, 16], [50, 12], [51, 10]];

				var plot_activities = $.plot($("#site_activities"), [{
					data : activities,
					color : "rgba(107,207,123, 0.9)",
					shadowSize : 0,
					bars : {
						show : true,
						lineWidth : 0,
						fill : true,
						fillColor : {
							colors : [{
								opacity : 1
							}, {
								opacity : 1
							}]
						}
					}
				}], {
					series : {
						bars : {
							show : true,
							barWidth : 0.9
						}
					},
					grid : {
						show : false,
						hoverable : true,
						clickable : false,
						autoHighlight : true,
						borderWidth : 0
					},
					yaxis : {
						min : 0,
						max : 20
					}
				});

				$("#site_activities").bind("plothover", function(event, pos, item) {
					$("#x").text(pos.x.toFixed(2));
					$("#y").text(pos.y.toFixed(2));
					if (item) {
						if (previousPoint2 != item.dataIndex) {
							previousPoint2 = item.dataIndex;
							$("#tooltip").remove();
							var x = item.datapoint[0].toFixed(2), y = item.datapoint[1].toFixed(2);
							showTooltip('24 Feb 2013', item.pageX, item.pageY, x);
						}
					}
				});

				$('#site_activities').bind("mouseleave", function() {
					$("#tooltip").remove();
				});
			}
		},

		initMiniCharts : function() {

			$('.easy-pie-chart .number.transactions').easyPieChart({
				animate : 1000,
				size : 75,
				lineWidth : 3,
				barColor : App.getLayoutColorCode('yellow')
			});

			$('.easy-pie-chart .number.visits').easyPieChart({
				animate : 1000,
				size : 75,
				lineWidth : 3,
				barColor : App.getLayoutColorCode('green')
			});

			$('.easy-pie-chart .number.bounce').easyPieChart({
				animate : 1000,
				size : 75,
				lineWidth : 3,
				barColor : App.getLayoutColorCode('red')
			});

			$('.easy-pie-chart-reload').click(function() {
				$('.easy-pie-chart .number').each(function() {
					var newValue = Math.floor(100 * Math.random());
					$(this).data('easyPieChart').update(newValue);
					$('span', this).text(newValue);
				});
			});

			$("#sparkline_bar").sparkline([8, 9, 10, 11, 10, 10, 12, 10, 10, 11, 9, 12, 11, 10, 9, 11, 13, 13, 12], {
				type : 'bar',
				width : '100',
				barWidth : 5,
				height : '55',
				barColor : '#35aa47',
				negBarColor : '#e02222'
			});

			$("#sparkline_bar2").sparkline([9, 11, 12, 13, 12, 13, 10, 14, 13, 11, 11, 12, 11, 11, 10, 12, 11, 10], {
				type : 'bar',
				width : '100',
				barWidth : 5,
				height : '55',
				barColor : '#ffb848',
				negBarColor : '#e02222'
			});

			$("#sparkline_line").sparkline([9, 10, 9, 10, 10, 11, 12, 10, 10, 11, 11, 12, 11, 10, 12, 11, 10, 12], {
				type : 'line',
				width : '100',
				height : '55',
				lineColor : '#ffb848'
			});

		},

		initChat : function() {

			var cont = $('#chats');
			var list = $('.chats', cont);
			var form = $('.chat-form', cont);
			var input = $('input', form);
			var btn = $('.btn', form);

			var handleClick = function(e) {
				e.preventDefault();

				var text = input.val();
				if (text.length == 0) {
					return;
				}

				var time = new Date();
				var time_str = time.toString('MMM dd, yyyy hh:mm');
				var tpl = '';
				tpl += '<li class="out">';
				tpl += '<img class="avatar" alt="" src="assets/img/avatar1.jpg"/>';
				tpl += '<div class="message">';
				tpl += '<span class="arrow"></span>';
				tpl += '<a href="#" class="name">Bob Nilson</a>&nbsp;';
				tpl += '<span class="datetime">at ' + time_str + '</span>';
				tpl += '<span class="body">';
				tpl += text;
				tpl += '</span>';
				tpl += '</div>';
				tpl += '</li>';

				var msg = list.append(tpl);
				input.val("");
				$('.scroller', cont).slimScroll({
					scrollTo : list.height()
				});
			}
			/*
			 $('.scroller', cont).slimScroll({
			 scrollTo: list.height()
			 });
			 */

			$('body').on('click', '.message .name', function(e) {
				e.preventDefault();
				// prevent click event

				var name = $(this).text();
				// get clicked user's full name
				input.val('@' + name + ':');
				// set it into the input field
				App.scrollTo(input);
				// scroll to input if needed
			});

			btn.click(handleClick);
			input.keypress(function(e) {
				if (e.which == 13) {
					handleClick();
					return false;
					//<---- Add this line
				}
			});
		}
	};

}(); 