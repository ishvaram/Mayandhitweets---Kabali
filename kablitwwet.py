from twython import Twython
import MySQLdb

conn=MySQLdb.connect (host ="",user="",passwd="",db="")  


#Replace Your credentials in empty quotes
TWITTER_APP_KEY = '' 
TWITTER_APP_KEY_SECRET = '' 
TWITTER_ACCESS_TOKEN = ''
TWITTER_ACCESS_TOKEN_SECRET = ''

t = Twython(app_key=TWITTER_APP_KEY, 
            app_secret=TWITTER_APP_KEY_SECRET, 
            oauth_token=TWITTER_ACCESS_TOKEN, 
            oauth_token_secret=TWITTER_ACCESS_TOKEN_SECRET)
query = '#mayanadhi -filter:retweets AND -filter:replies' 
search = t.search(q=query,  
                  count=100)

tweets = search['statuses']
profile_image_url_back = ''
for tweet in tweets:
  screen_name =  tweet['user']['screen_name'].encode("utf-8")
  uname = tweet['user']['name'].encode("utf-8")
  tweeted = tweet['text'].encode('utf-8')
  profile_image = tweet['user']['profile_image_url'].encode("utf-8")
  created_at = tweet['created_at'].encode("utf-8")
  cursore=conn.cursor()
  datum="insert into kabali_tweets (id,tweet,profile_img_url,display_name,screen_name,created_at) values (%s , %s , %s , %s, %s,%s)"                                          
  cursore.execute(datum,('',tweeted,profile_image,uname,screen_name,created_at))
  conn.commit()

  # print screen_name
  # print tweeted
  # print uname
  # print profile_image
  # print created_at