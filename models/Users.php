<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property integer $id
 * @property integer $home_office_id
 * @property string $username
 * @property string $password
 * @property string $email
 * @property string $name
 * @property string $surname
 * @property string $registered
 * @property string $lastactive
 * @property integer $active
 * @property string $avatar
 *
 * @property ConversationMessages[] $conversationMessages
 * @property Conversations[] $conversations
 * @property DailyTimeSheet[] $dailyTimeSheets
 * @property Documents[] $documents
 * @property HeaderForumThreadPosts[] $headerForumThreadPosts
 * @property HeaderForumThreads[] $headerForumThreads
 * @property HeaderForums[] $headerForums
 * @property HfforumUser[] $hfforumUsers
 * @property HeaderForums[] $hfforums
 * @property Notifications[] $notifications
 * @property OfficePosts[] $officePosts
 * @property OfficeUser[] $officeUsers
 * @property Offices[] $offices
 * @property PostsTask[] $postsTasks
 * @property ProjectPosts[] $projectPosts
 * @property ProjectUser[] $projectUsers
 * @property Projects[] $projects
 * @property QnaForums[] $qnaForums
 * @property QnaPosts[] $qnaPosts
 * @property QnaThreads[] $qnaThreads
 * @property QnaforumUser[] $qnaforumUsers
 * @property QnaForums[] $qnaforums
 * @property Requests[] $requests
 * @property TaskLogs[] $taskLogs
 * @property Tasks[] $tasks
 * @property UserContacts[] $userContacts
 * @property UserHfforum[] $userHfforums
 * @property UserRole[] $userRoles
 * @property Roles[] $roles
 * @property UserSettings[] $userSettings
 * @property Offices $homeOffice
 * @property UsersInfo[] $usersInfos
 * @property Versions[] $versions
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['home_office_id', 'active'], 'integer'],
            [['username', 'password', 'email', 'name', 'surname', 'registered', 'lastactive', 'active'], 'required'],
            [['registered', 'lastactive'], 'safe'],
            [['username', 'password', 'email', 'name', 'surname', 'avatar'], 'string', 'max' => 255],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['home_office_id'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'home_office_id' => 'Home Office ID',
            'username' => 'Username',
            'password' => 'Password',
            'email' => 'Email',
            'name' => 'Name',
            'surname' => 'Surname',
            'registered' => 'Registered',
            'lastactive' => 'Lastactive',
            'active' => 'Active',
            'avatar' => 'Avatar',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConversationMessages()
    {
        return $this->hasMany(ConversationMessages::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConversations()
    {
        return $this->hasMany(Conversations::className(), ['user1_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDailyTimeSheets()
    {
        return $this->hasMany(DailyTimeSheet::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDocuments()
    {
        return $this->hasMany(Documents::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHeaderForumThreadPosts()
    {
        return $this->hasMany(HeaderForumThreadPosts::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHeaderForumThreads()
    {
        return $this->hasMany(HeaderForumThreads::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHeaderForums()
    {
        return $this->hasMany(HeaderForums::className(), ['onwer_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHfforumUsers()
    {
        return $this->hasMany(HfforumUser::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHfforums()
    {
        return $this->hasMany(HeaderForums::className(), ['id' => 'hfforum_id'])->viaTable('user_hfforum', ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNotifications()
    {
        return $this->hasMany(Notifications::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOfficePosts()
    {
        return $this->hasMany(OfficePosts::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOfficeUsers()
    {
        return $this->hasMany(OfficeUser::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOffices()
    {
        return $this->hasMany(Offices::className(), ['owner_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPostsTasks()
    {
        return $this->hasMany(PostsTask::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjectPosts()
    {
        return $this->hasMany(ProjectPosts::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjectUsers()
    {
        return $this->hasMany(ProjectUser::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjects()
    {
        return $this->hasMany(Projects::className(), ['owner_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQnaForums()
    {
        return $this->hasMany(QnaForums::className(), ['onwer_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQnaPosts()
    {
        return $this->hasMany(QnaPosts::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQnaThreads()
    {
        return $this->hasMany(QnaThreads::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQnaforumUsers()
    {
        return $this->hasMany(QnaforumUser::className(), ['user_id' => 'id']);
    }



    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRequests()
    {
        return $this->hasMany(Requests::className(), ['contact_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTaskLogs()
    {
        return $this->hasMany(TaskLogs::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTasks()
    {
        return $this->hasMany(Tasks::className(), ['assigned_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserContacts()
    {
        return $this->hasMany(UserContacts::className(), ['contact_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserHfforums()
    {
        return $this->hasMany(UserHfforum::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserRoles()
    {
        return $this->hasMany(UserRole::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRoles()
    {
        return $this->hasMany(Roles::className(), ['id' => 'role_id'])->viaTable('user_role', ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserSettings()
    {
        return $this->hasMany(UserSettings::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHomeOffice()
    {
        return $this->hasOne(Offices::className(), ['id' => 'home_office_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsersInfos()
    {
        return $this->hasMany(UsersInfo::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVersions()
    {
        return $this->hasMany(Versions::className(), ['owner_id' => 'id']);
    }
}
