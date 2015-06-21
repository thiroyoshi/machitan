<script src="/js/app/list/index.js"></script>
<div class="jumbotron" style="background-image:url('../img/machitan_pic/top/1.jpg'); background-position: center center; background-size:cover;">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
            <!-- <img src='../img/machitan_logo.png'> -->
            </div>
            <div class="col-md-6" style="background: rgba(0,0,0,.6);">
                <div style="color: #fff; text-shadow: 2px 2px 8px rgba(0,0,0,1); ">
                    <br>
                    <h2>散歩して健康増進してみませんか？</h2>
                    <br>
                    <br>
                    <!--
                    <p style="font-size:100%;">お近くの町、片町をお散歩しましょう。</p>
                    <p style="font-size:100%;">行き先はお任せください。</p>
                    <p style="font-size:100%;">あなたの片町発見に適したコースをご提供します。</p>
                    -->
                    <p style="font-size:100%;">横浜をお散歩して、健康増進に役立てましょう。</p>
                    <p style="font-size:100%;">行き先はお任せください。</p>
                    <p style="font-size:100%;">あなたのヘルスケアに適したウォーキングコースをご提供します。</p>
                    <p style="font-size:100%;">もちろん歩いていて飽きないコースです。</p>
                    <br>
                    <br>

                </div>
            </div>
        </div>
        <br>
        <br>
        <div style="text-align:center;">
            <div style="color: #fff; text-shadow: 2px 2px 8px rgba(0,0,0,1); ">
            <?php 
                if($geo_info != null){
                echo "<h3>現在地が取得できませんでした。もう一度ボタンをタッチしてください</h3>";
            } ?>
            <a class="btn btn-info btn-lg" href="list?geo_info=" style="width:100%;">ウォーキングする</a>
            </div>
        </div>
    </div>
</div>
