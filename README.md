# 環境要件  
- Cloud9（新規WorkSpaces）  
- Github

# インストール手順   
### Cloud9
- Cloud9にて新規WorkSpacesを用意(Create a new WorkSpaces）
1. WorkSpace name（大文字NG）、Description入力
2. Hosted WorkspaceはPublicを選択
3. Clone from Git or Mercurial URL (optional)
 - SSH：git@github.com:c-yano/mikanmikan.git   
4. Choose a template
 - PHP & Apacheを選択
5. Creating workspase

### Githubにて
1. コラボレータの登録をマスターに依頼 （githubのユーザIDを伝える）

###勉強会の進め方
FY16に実施した勉強会のコードを整理する
- 関数化できる処理は関数にする
- 再度コードの確認をする

1. issueの作成(githubにて)<br>
    - 勉強会にてissueをあげる
2. issueのアサイン(githubにて)<br>
    - アサインされたissueを解決する
3. Cloud9にてbranchを作成
#### branchルール 
#### branchはissue毎に用意し、branch名は、githubでアサインされたissue#+issue番号
    - git branch issue#番号（番号はissue番号）
    - git checkout issue#番号
4. 各自のCloud9にてコード修正
5. コードの修正後、マージリクエストする
   - ステージングエリアにあげる
    - git add file-name
   - コメント付きでコミット
    - git commit
    　＊コメントにはissues番号（#番号)を明記<br>
    - リモートブランチにコードを追加（git push origin issue#番号）<br>
    　＊slackへ通知される（Channle github-link）<br>
 6. 確認後　pull-requestを実施<br>
    - branch issue#にて「Compare & pull request」を実施<br>
 7. マージ処理（Masterにて実施）
 8. 作成したgit branchの削除
    
