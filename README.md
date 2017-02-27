<!DOCTYPEhtml>
<html>
<head>
    <meta charset="UTF-8">
    <title>README</title>
</head>
<body>
    ▪️環境要件<br>
    -Cloud9（新規WorkSpaces）<br>
    -Github<br>
    <br>
    ・インストール手順
    <Cloud9にて>
    -Cloud9にて新規WorkSpacesを用意<br>
    -修正するコードを取り込む<br>
    SSH：git@github.com:c-yano/mikanmikan.git<br>
    http:https://github.com/c-yano/mikanmikan.git<br>
    <img src="https://files.slack.com/files-pri/T0A9LJE6T-F3XC3UJF2/sc_2017-01-30_16.47.16.png"/>
    <Githubにて>
    -コラボレータの登録を依頼（githubのユーザID）<br>
    <br>
    ・Webアクセス方法<br>
    ・運用<br>
    1.issueの作成(github)<br>
    2.issueのアサイン(github)<br>
    3.Cloud9にてbranchの作成<br>
      - git branch issues番号（番号はissue番号）<br>
      - git checkout issus番号<br>
    4.各自のCloud9にてプログラム修正<br>
    5.マージリクエスト<br>
    　- ステージングエリアにあげる（git add fiel-name）<br>
    　- コメント付きでコミット（git commit ）<br>
    　　＊コメントにはissues番号を明記<br>
    　- リモートブランチにコードを追加（git push origin issues#番号）<br>
    　　＊slackへ通知される（Channle github-link）<br>
    6.確認後　pull-requestを実施<br>
      - branch issues#にて「Compare & pull request」を実施<br>
    7.マージ処理（Masterにて実施）
    8.作成したgit branchの削除
    9.
    10.
    
    
</body>
</html>