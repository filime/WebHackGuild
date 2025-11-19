// 점수 데이터를 요청하는 함수
async function fetchScores() {
    try {
        const response = await fetch('/get_rank');  // 서버에서 점수 요청
        const data = await response.json();  // JSON 형태로 응답 받기

        

        // 랭크 출력
        displayRank(data.players);
    } catch (error) {
        console.error('점수 데이터를 불러오는 데 오류가 발생했습니다:', error);
    }
}

// 랭크를 계산하고 표시하는 함수
function displayRank(players) {
    // 점수를 기준으로 내림차순 정렬
    players.sort((a, b) => b.score - a.score);

    // 랭킹 텍스트 생성
    let rankText = 'Rankings:\n';
    players.forEach((player, index) => {
        rankText += ` ${player.name} - ${player.score} exp\n`;
    });

    // 화면에 출력
    document.getElementById('rank').innerText = rankText;
}


// 페이지가 로드되면 점수 가져오기
window.onload = fetchScores;
