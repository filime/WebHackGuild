<?php
include "base.php";
islogin();

    ?>
<!DOCTYPE html>
<html lang="ko">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>자유 게시판 목록</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        
        body {
            background-color: #f8f9fa;
        }
        
        .board-container {
            max-width: 700px;
            margin: 50px auto;
            background: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        
        .list-group-item {
            transition: background-color 0.3s, transform 0.2s;
            border: none;
            border-bottom: 1px solid #dee2e6;
        }
        
        .list-group-item:last-child {
            border-bottom: none;
        }

        .list-group-item:hover {
            background-color:rgb(83, 83, 83);
            color: white;
            transform: scale(1.02);
        }
        
        .list-group-item:hover a {
            color: white;
        }
        
        .list-group-item a {
            text-decoration: none;
            color: #343a40;
            font-weight: 500;
        }
        
        .list-group-item a:hover {
            text-decoration: underline;
        }
        
        .date {
            font-size: 0.85rem;
            color: #6c757d;
        }

    </style>
</head>
<body>

<div class="container">
    <div class="board-container">
        <h2 class="text-center mb-4">⚔️ Tower Of Whispering 🛡️</h2>
        <!-- <a class="btn" href="/logout.php">logout</a> Maybe, u don't need it forever XD -->
        <ul class="list-group">

            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="/probs/ghost.php">Ghost 👻</a>
                <span class=""><?php echo issolved("Ghost") ? "✅": "❌"; ?></span>
            </li>

            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="/probs/ghost_twins.php">Ghost twins 👻👻</a>
                <span class=""><?php echo issolved("ghost_twins") ? "✅":"❌"; ?></span>
            </li>

            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="/probs/triple_trouble_ghost.php">Triple Trouble Ghost 👻👻👻</a>
                <span class=""><?php echo issolved("triple_trouble_ghost") ? "✅": "❌"; ?></span>
            </li>

            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="/probs/ghost_king.php">Ghost king 👑👻</a>
                <span class=""><?php echo issolved("ghost_king") ? "✅": "❌"; ?></span>
            </li>

            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="/probs/phantom.php">Phantom 👾</a>
                <span class=""><?php echo issolved("Phantom") ? "✅": "❌"; ?></span>
            </li>

            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="/probs/haunter.php">Haunter 👿</a>
                <span class=""><?php echo issolved("Haunter") ? "✅": "❌"; ?></span>
            </li>

            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="/probs/dirt_golem.php">Dirt golem 💪🏾</a>
                <span class=""><?php echo issolved("dirt_golem") ?  "✅": "❌"; ?></span>
            </li>

            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="/probs/stone_golem.php">Stone golem 🪨</a>
                <span class=""><?php echo issolved("stone_golem") ? "✅": "❌"; ?></span>
            </li>

            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="/probs/iron_golem.php">Iron golem 🤖</a>
                <span class=""><?php echo issolved("iron_golem") ? "✅": "❌"; ?></span>
            </li>

            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="/probs/floor_keeper.php">Floor Keeper 🧙‍♂️</a>
                <span class=""><?php echo issolved("floor_keeper") ? "✅": "❌"; ?></span>
            </li>
        </ul>
    </div>
</div>

<?php if ($_SESSION["EXP"] > 84){
?>
<div class="container">
    <div class="board-container">
        <h2 class="text-center mb-4" style="color:red;">⚔️ Tower Of Whispering (Hell Mode) 🛡️</h2>

        <ul class="list-group">
            <li class="list-group-item d-flex justify-content-between align-items-center">
		<a href="/hard/deep_dive/deep_dive.php">Deep Dive 🌊</a>
		<span class=""><?php echo issolved("deep_dive") ? "✅": "❌"; ?></span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="/hard/dark_side/dark_side.php">Dark Side🥷</a>
                <span class=""><?php echo issolved("dark_side") ? "✅": "❌"; ?></span>
	    </li>
		<li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="/hard/guessing/guessing.php">Guessing🤔</a>
                <span class=""><?php echo issolved("guessing") ? "✅": "❌"; ?></span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="/probs/c9ebbe29-0ffd-4fe2-9cc4-a3d6f8865ce6.php">In construction</a>
                <span class=""><?php echo issolved("dd") ? "✅": "❌"; ?></span>
            </li>
        </ul>
    </div>
</div>
<?php
	}
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
