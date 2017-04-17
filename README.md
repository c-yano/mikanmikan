# 環境要件  
- Cloud9（新規WorkSpaces）  
- Github

# インストール手順   
## Cloud9
- Cloud9にて新規WorkSpacesを用意(Create a new WorkSpaces）
1. WorkSpace name（大文字NG）、Description
- 修正するコードを取り込む  
    SSH：git@github.com:c-yano/mikanmikan.git  
    http:https://github.com/c-yano/mikanmikan.git  
# Githubにて
    -コラボレータの登録を依頼 githubのユーザID  
    ・Webアクセス方法  
    ・運用  

    '''    
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
    '''
    
